/*
Author: Tristan Denyer (based on Charlie Griefer's original clone code)
Plugin and demo at http://tristandenyer.com/using-jquery-to-duplicate-a-section-of-a-form-maintaining-accessibility/
Ver: 0.9.1
Date: Dec 8, 2012
*/
$(function () {
    $('#btnAddC').click(function () {
        var num = $('.cloneC').length, // how many "duplicatable" input fields we currently have
            newNum = new Number(num + 1), // the numeric ID of the new input field being added
            newElem = $('#copyC' + num).clone().attr('id', 'copyC' + newNum).fadeIn('slow'); // create the new element via clone(), and manipulate it's ID using newNum value
        // manipulate the name/id values of the input inside the new element

         

       
        // text
        newElem.find('.test-text-label').attr('for', 'ID' + newNum + '_text');
        newElem.find('.test-text').attr('id', 'ID' + newNum + '_text').attr('name', 'ID' + newNum + '_text').val('');

        

        // insert the new element after the last "duplicatable" input field
        $('#copyC' + num).after(newElem);

        // enable the "remove" button
        $('#btnDelC').attr('disabled', false);

        // right now you can only add 5 sections. change '5' below to the max number of times the form can be duplicated
        if (newNum == 40) $('#btnAddC').attr('disabled', true).prop('value', "You've reached the limit");
    });

    $('#btnDelC').click(function () {
        // confirmation
        if (confirm("Are you sure you wish to remove this section of the form? Any information it contains will be lost!")) {
            var num = $('.cloneC').length;
            // how many "duplicatable" input fields we currently have
            $('#copyC' + num).slideUp('slow', function () {
                $(this).remove();
                // if only one element remains, disable the "remove" button
                if (num - 1 === 1) $('#btnDelC').attr('disabled', true);
                // enable the "add" button
                $('#btnAddC').attr('disabled', false).prop('value', "ADD ACTOR");
            });
        }
        return false;
        // remove the last element

        // enable the "add" button
        $('#btnAddC').attr('disabled', false);
    });

    $('#btnDelC').attr('disabled', true);
});