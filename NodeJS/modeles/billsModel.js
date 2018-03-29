const mongoose = require('mongoose');
var Schema = mongoose.Schema;

billsSchema = new mongoose.Schema({
    libelle: String,
    date_prestation: Date,
    date_relance: Date,
    date_facutre: {
        type: Date,
        validate: {
            validator: function (v) {
                return (v >= this.date_prestation)
            },
            message: 'Facture cannot be before prestation !'
        }
    },
    montant: {
        type: Number,
        min: [0, 'Cannot be negative !']
    },
    tva: {
        type: Number,
        min: 0,
        max: 25
    },
    client: {type: mongoose.Schema.Types.ObjectId, ref: 'customer'},
    type_prestation: {
        type: String,
        enum: ['Formation', 'Dev']
    }

});

const billsModel = mongoose.model('bill', billsSchema);

module.exports = billsModel;