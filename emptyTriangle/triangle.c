/* T.CHENIER - IMIE 2018
** This function print a triangle
** with the 'O' char inside
*/

#include <unistd.h>

void    print_char(char c)
{
        write(1, &c, 1);
}

void    print_triangle(int nb)
{
        int     i;
        int     j;

        i = 1;
        while(i <= nb)
        {
        j = 1;
                while(j <= i)
                {
                        if (j == i || i == nb || j == (j - i))
                                print_char('*');
                        else
                                print_char('O');
                        j++;
                }
                print_char('\n');
                i++;
        }
}

int     main(void)
{
        print_triangle(10);

        return (0);
}
