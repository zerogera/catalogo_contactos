$(document).ready(function() {

    var MaxInputs = 100; // maximum input boxes allowed
    var contenedorEmail = $("#contenedorEmail"); // Input boxes wrapper ID
    var contenedorDireccion = $("#contenedorDireccion"); // Input boxes wrapper ID
    var contenedorTelefono = $("#contenedorTelefono"); // Input boxes wrapper ID
    var AddButtonEmail = $("#agregarEmail"); // Add button ID
    var AddButtonDireccion = $("#agregarDireccion"); // Add button ID
    var AddButtonTelefono = $("#agregarTelefono"); // Add button ID

    // var x = contenedor.length; //initlal text box count
    var x = $("#contenedorEmail div").length;
    var FieldCountEmail = x - 1; //to keep track of text box added
    var FieldCountDireccion = x - 1; //to keep track of text box added
    var FieldCountTelefono = x - 1; //to keep track of text box added

    //--- EMAIL ---//
    $(AddButtonEmail).click(function(e) //on add input button click
        {
            if (x <= MaxInputs) // max input box allowed
            {
                FieldCountEmail++; // text box added increment
                //add input box
                $(contenedorEmail).append('<div class="addedEmail">' +
                    '  <input type="email" class="form-control" name="email[]" id="campo_' + FieldCountEmail + '" placeholder="Email ' + FieldCountEmail + '"/>' + '  <a href="#" class="eliminar">&times;</a>' +
                    '</div>');
                x++; // text box increment
            }
            return false;
        });

    //--- DIRECCION ---//
    $(AddButtonDireccion).click(function(e) // on add input button click
        {
            if (x <= MaxInputs) // max input box allowed
            {
                FieldCountDireccion++; // text box added increment
                //add input box
                $(contenedorDireccion).append('<div class="addedDireccion">' +
                    '  <input type="text" class="form-control" name="direccion[]" id="campo_' + FieldCountDireccion + '" placeholder="Direccion ' + FieldCountDireccion + '"/>' + '  <a href="#" class="eliminar">&times;</a>' +
                    '</div>');
                x++; //text box increment
            }
            return false;
        });

    //--- TELEFONO ---//
    $(AddButtonTelefono).click(function(e) //on add input button click
        {
            if (x <= MaxInputs) //max input box allowed
            {
                FieldCountTelefono++; //text box added increment
                //add input box
                $(contenedorTelefono).append('<div class="addeTelefono">' +
                    '  <div class="input-group">' +
                    '      <input type="text" class="form-control" name="descripcion[]" id="campo_' + FieldCountTelefono + '" placeholder="Descripcion ' + FieldCountTelefono + '"/>' +
                    '      <input type="text" class="form-control" name="telefono[]" id="campo_' + FieldCountTelefono + '" placeholder="Telefono ' + FieldCountTelefono + '"/>' + '  <a href="#" class="eliminar">&times;</a>' +
                    '   </div>' +
                    '</div>');
                x++; //text box increment
            }
            return false;
        });

    $("body").on("click", ".eliminar", function(e) { //user click on remove text
        if (x > 1) {
            $(this).parent('div').remove(); //remove text box
            //x--; //decrement textbox
        }
        return false;
    });
});