/*
Author: Tristan Denyer (based on Charlie Griefer's original clone code)
Plugin and demo at http://tristandenyer.com/using-jquery-to-duplicate-a-section-of-a-form-maintaining-accessibility/
Ver: 0.9.1
Date: Dec 8, 2012
*/
$(function () {
    $('#btnAddG').click(function () {
        var num = $('.cloneG').length, // how many "duplicatable" input fields we currently have
            newNum = new Number(num + 1), // the numeric ID of the new input field being added
            newElem = $('#copyG' + num).clone().attr('id', 'copyG' + newNum).fadeIn('slow'); // create the new element via clone(), and manipulate it's ID using newNum value
        // manipulate the name/id values of the input inside the new element

        
       

        // genre
        
        newElem.find('.test-mgenre-label').attr('for', 'ID' + newNum + '_mgenre');
        newElem.find('.test-mgenre').attr('id', 'ID' + newNum + '_mgenre').attr('name', 'ID' + newNum + '_nome_genero').val('');    
        
        
        
        // insert the new element after the last "duplicatable" input field
        $('#copyG' + num).after(newElem);

        // enable the "remove" button
        $('#btnDelG').attr('disabled', false);

        // right now you can only add 13 sections. change '13' below to the max number of times the form can be duplicated
        if (newNum == 3) $('#btnAddG').attr('disabled', true).prop('value', "You've reached the limit");
    });

    $('#btnDelG').click(function () {
        // confirmation
        if (confirm("Are you sure you wish to remove this section of the form? Any information it contains will be lost!")) {
            var num = $('.cloneG').length;
            // how many "duplicatable" input fields we currently have
            $('#copyG' + num).slideUp('slow', function () {
                $(this).remove();
                // if only one element remains, disable the "remove" button
                if (num - 1 === 1) $('#btnDelG').attr('disabled', true);
                // enable the "add" button
                $('#btnAddG').attr('disabled', false).prop('value', "1 MORE GENRE");
            });
        }
        return false;
        // remove the last element

        // enable the "add" button
        $('#btnAddG').attr('disabled', false);
    });

    $('#btnDelG').attr('disabled', true);
});