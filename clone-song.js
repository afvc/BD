/*
Author: Tristan Denyer (based on Charlie Griefer's original clone code)
Plugin and demo at http://tristandenyer.com/using-jquery-to-duplicate-a-section-of-a-form-maintaining-accessibility/
Ver: 0.9.1
Date: Dec 8, 2012
*/
$(function () {
    $('#btnAddS').click(function () {
        var num = $('.clone').length, // how many "duplicatable" input fields we currently have
            newNum = new Number(num + 1), // the numeric ID of the new input field being added
            newElem = $('#copy' + num).clone().attr('id', 'copy' + newNum).fadeIn('slow'); // create the new element via clone(), and manipulate it's ID using newNum value
        // manipulate the name/id values of the input inside the new element

        // reference
        newElem.find('.heading-reference').attr('id', 'ID' + newNum + '_reference').attr('name', 'ID' + newNum + '_reference').html('');

       
        // text
        newElem.find('.test-text-label').attr('for', 'ID' + newNum + '_text');
        newElem.find('.test-text').attr('id', 'ID' + newNum + '_text').attr('name', 'ID' + newNum + '_text').val('');

        

        // insert the new element after the last "duplicatable" input field
        $('#copy' + num).after(newElem);

        // enable the "remove" button
        $('#btnDelS').attr('disabled', false);

        // right now you can only add 5 sections. change '5' below to the max number of times the form can be duplicated
        if (newNum == 13) $('#btnAddS').attr('disabled', true).prop('value', "You've reached the limit");
    });

    $('#btnDelS').click(function () {
        // confirmation
        if (confirm("Are you sure you wish to remove this section of the form? Any information it contains will be lost!")) {
            var num = $('.clone').length;
            // how many "duplicatable" input fields we currently have
            $('#copy' + num).slideUp('slow', function () {
                $(this).remove();
                // if only one element remains, disable the "remove" button
                if (num - 1 === 1) $('#btnDelS').attr('disabled', true);
                // enable the "add" button
                $('#btnAddS').attr('disabled', false).prop('value', "ADD SONG");
            });
        }
        return false;
        // remove the last element

        // enable the "add" button
        $('#btnAddS').attr('disabled', false);
    });

    $('#btnDelS').attr('disabled', true);
});