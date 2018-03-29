var express = require('express');
var router = express.Router();
var billModel = require('../modeles/customersModel');

/* GET bills data. */ // localhost:3000/bills/bills/
router.get('/', function(req, res, next) {
    billModel.find({},{},function(err,result){
        var errs = [];
        if (err) {console.log(err);errs.push(err);};
        console.log(result);
        res.send(result);
        //res.send(truc) // ==> HEADERS CANNOT BE SET AFTER THEY ARE SENT.
    }).populate();
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

router.post('/bindCustomer', function (req, res) {
    var params = req.body;

    params.save(function (err, res) {
        res.send("ok bind Customer");
    });
});

module.exports = router;

