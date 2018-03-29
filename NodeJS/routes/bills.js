// factures

var express = require('express');
var router = express.Router();
var billModel = require('../modeles/billsModel');
//var customerModel = require('../modeles/customersModel');

/* GET bills page. */
router.get('/', function (req, res, next) {

    res.render('bills', {title: 'Bills Listing'});
});

/* GET bills data. */ // localhost:3000/bills/bills/
router.get('/bills', function(req, res, next) {
    billModel.find().populate('client').exec(function (err, bills) {
        res.send(bills);
    });
});

router.put('/', function (req, res) {
    var bill = req.body;

    billModel.findByIdAndUpdate(bill._id, bill, function (err, result) {
        if (err) console.log(err);
        res.send('modification effectuée: ' + result);
    });
});

router.delete('/', function (req, res) {
    var bill = req.body._id;

    billModel.findByIdAndRemove(bill, function (err, result) {
        if (err) console.log(err);
        res.send('delete ok with: ' + result);
    })
});

router.post('/', function (req, res) {
    var bill = new billModel(req.body);
    console.log(req);
    console.log(res);

    bill.save(function (err, result) {
        if (err) console.log(err);
        res.send('add bill: ' + result);
    });
});



module.exports = router;
