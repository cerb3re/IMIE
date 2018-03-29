var factures = [];

function insertStorageData(datas) {
    // stringifier facture, modifier facture[i].data... parser dans local storage et retourner status
    var inputs = datas[0];
    var spans = datas[1];

    $.ajax({
        url: 'bills',
        type: 'POST',
        dataType: 'JSON',
        success: function (res, stat) {
            console.log(res);
            console.log(stat);
        },
        error: function (res, stat, err) {
            console.log(res);
            console.log(stat);
            console.log(err);
        }
    });

    for (input in inputs) {
        console.log(inputs[input].value);
    }

    for (span in spans) {
        console.log(spans[span]);
    }
}

function statusView(status, formField) {
    // if all condition are true it print valid
    flow = '<form class="form-inline" align="center">VALIDATION OK<div class="form-group">';
    if (status) {
        insertStorageData(formField);
        $('.modal-title').html('<span class="label label-success">Insert Success</span>');
    } else {
        $('.modal-title').html('<span class="label label-danger">Missing Input</span>');
    }
    $('.modal-footer').html('' +
        '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>'
    );
    flow += '</div></form>';

    return (flow);
}

// check data validity insertion
function insertStatus(input) {
    var inputStatus = true;

    for (i in input) {
        if (input[i].value === '')
            inputStatus = false;
    }

    return (inputStatus);
}

// generate view for modal Facture
function modalGenerateView(flow) {
    $('.gen').each(function () {
        $(this).click(function (e) {
            i = e.target.id.split('_')[1];
            flow = '<form class="form-inline" align="center"><div class="form-group">';

            if (factures[i].client === 1) {
                for (j in factures[i].client.contacts) {
                    var contact = factures[i].client;
                    var props = Object.getOwnPropertyNames(contact);

                    for (k in props) {
                        flow += '<label for="inputName_' + i + '"> ' + props[k] + '</label><br />';
                        flow += '<span id="input_' + i + '" class="form-control mx-sm-3">' + eval('contact.' + props[k]) + '</span><br />';
                    }
                    flow += '<label for="inputName_' + i + '"> Prestation </label><br />';
                    flow += '<span id="input_' + i + '" class="form-control mx-sm-3">' + factures[i].type_prestation + '</span><br />';
                }
            } else {
                for (j in factures[i].client) {
                    var contact = factures[i].client;
                    var props = Object.getOwnPropertyNames(contact);
                    flow += '<select class="form-control mx-sm-3">';

                    for (k in props[j]) {
                        flow += '<option>' + +'</option>';
                    }
                    flow += '</select>';

                }

            }

            $('.modal-title').html("Facture generation for: " + factures[i].client.nom)
            $('.modal-footer').html('' +
                '<button type="button" id="btnGenerate' + i + '" class="btn btn-default" data-dismiss="modal">Generate</button>' +
                '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>'
            );

            flow += '</div></form>';
            $('.modal-body').html(flow);
            $('#btnGenerate' + i).click(function () {

                $('#dvBody').html('');
                render(modalW);
            });
        });
    });

    return (flow);
}

// add new data
function modalAddView(flow) {
    $('.add').each(function () {
        $(this).click(function (e) {
            i = e.target.id.split('_')[1];
            flow = '<form class="form-inline" align="center"><div class="form-group">';

            flow += '<!-- Name Input -->';
            flow += '<label for="inputName_' + i + '">Client Name</label><br />';
            flow += '<span id="input_' + i + '" class="form-control mx-sm-3">' + factures[i].client + '</span><br />';
            flow += '<!-- Montant Input -->';
            flow += '<label for="inputFactures_' + i + '">Client Total:</label><br />';
            flow += '<input type="text" id="input_' + i + '" class="form-control mx-sm-3" placeholder="' + factures[i].montant + '"><br />';
            flow += '<!-- Montant Input -->';
            flow += '<label for="inputFactures_' + i + '">Client Total:</label><br />';
            flow += '<input type="text" id="input_' + i + '" class="form-control mx-sm-3" placeholder="' + factures[i].montant + '"><br />';
            $('.modal-title').html("Facture Add for: " + factures[i].client)
            $('.modal-footer').html('' +
                '<button type="button" id="btnInsert' + i + '" class="btn btn-default" data-dismiss="modal">Modify</button>' +
                '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>'
            );

            flow += '</div></form>';
            $('.modal-body').html(flow);
            $('#btnInsert' + i).click(function () {
                var inputs = $('input').get();
                var formField = [];

                formField[0] = inputs;
                formField[1] = [$('#input_' + i).text()];

                var modalW = statusView(insertStatus(inputs), formField);
                $('#dvBody').html('');
                render(modalW);
            });
        });
    });

    return (flow);
}

// initial render view
function initialView(flow) {
    console.log(this.factures.length)
    for (i in factures) {
        console.log('ok');
        flow = '<div class="render"><span><button type="button" id="btnAdd_' + i + '" class="add btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">add</button>';
        flow += '<button type="button" id="btnGenerate_' + i + '" class="gen btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Generate</button>';
        flow += '<button type="button" id="' + factures[i]._id + '" class="btn btn-primary btn-sm">X</button>';
        flow += '</span><span><table class="table table-bordered">';
        flow += '<thead><tr><th>Nom</th><th>Ville</th><th>total</th></tr></thead>';
        flow += '<tbody><tr><td>' + factures[i].client.nom + '</td><td>' + factures[i].type_prestation + '</td><td>' + factures[i].montant + '</td></tr></tbody>';
        flow += '</table></span></div>';

        $('#dvBody').append(flow);
    }

    return (flow);
}

// Delete data
function modalDeleteView(flow) {
    $(this).click(function (e) {
        console.log(e.target.id);
        $.ajax({
            url: 'bills/',
            type: 'DELETE',
            data: {
                _id: e.target.id,
            },
            dataType: 'JSON',
            success: function (res, stat) {
                console.log('Delete Succcess ! ');
            },
            error: function (res, stat, err) {
                console.log(res);
                console.log(stat);
                console.log(err);
            }
        });
    });
    return (flow);
}

// view definition render
function render(flow) {
    // revoir refresh missing input

    // generate view
    flow += initialView(flow);
    flow += modalGenerateView(flow);
    flow += modalAddView(flow);
    flow += modalDeleteView(flow);

    // set align view structure
    $('.render').css({'text-align': 'right'});
    $('.modal-title').css({'text-align': 'center'});
}

// main() function
$(function () {
    // modify this variable to external graphical designer graphical flow
    var flow = "";
    $.ajax({
        url: 'bills/bills',// localhost:3000/bills/bills
        type: 'GET',
        dataType: 'JSON', // On désire recevoir du JSON
        success: function (result, statut) { // code_html contient le HTML renvoyé
            factures = result;
            render(flow);
        },
        error: function (resultat, statut, erreur) {
            //afficher un message d'erreur
            console.log(resultat + "Erreur INSERT, statut: " + statut + " - erreur : " + erreur);
        }
    });

});

