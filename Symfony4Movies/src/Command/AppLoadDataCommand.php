<?php

namespace App\Command;

use App\Entity\Review;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;

class AppLoadDataCommand extends Command
{
    protected static $defaultName = 'app:load-data';
    protected $em;

    public function __construct($name = null, EntityManagerInterface $em)
    {
        parent::__construct($name);
        $this->em = $em;
    }

    protected function configure()
    {
        $this->setName(self::$defaultName)->setDescription('Load dummy data in database.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $faker  = \Faker\Factory::create('fr_FR');
        $io     = new SymfonyStyle($input, $output);

        $this->em->getConnection()->exec("TRUNCATE review");

        $data   = (int)$io->askQuestion(new Question('How many Data would you insert ?'));
        $io->progressStart($data);

        for ($i = 0; $i < $data; $i++)
        {
            $review = new Review();
            $review->setTitle($faker->sentence);
            $review->setUsername($faker->userName);
            $review->setEmail($faker->email);
            $review->setContent($faker->realText(1000));
            $review->setDateCreated($faker->dateTimeBetween("-2 years"));
            $this->em->persist($review);

            $io->progressAdvance();
        }

        $io->progressFinish();
        $this->em->flush();

        $io->success('Data have been correctly insert.');


    }
}
