const mongoose = require('mongoose');
var Schema = mongoose.Schema;

contactSchema = new mongoose.Schema({
    nom: String,
    mail: {
        type: String,
        trim: true,
        lowercase: true,
        unique: false,
    },
    tel: {type: String,  maxlength: 10 },
    mobile: {type: String,  maxlength: 10}
});

customersSchema = new mongoose.Schema({
    _id: Schema.Types.ObjectId,
    nom:{type:String, required:true},
    siret: String,
});

const customersModel = mongoose.model('customer', customersSchema);
module.exports = customersModel;