/*
Author: Tristan Denyer (based on Charlie Griefer's original clone code)
Plugin and demo at http://tristandenyer.com/using-jquery-to-duplicate-a-section-of-a-form-maintaining-accessibility/
Ver: 0.9.1
Date: Dec 8, 2012
*/


$(function () {
    $('#btnAdd').click(function () {
        var num = $('.clonedInput').length, // how many "duplicatable" input fields we currently have
            newNum = new Number(num + 1), // the numeric ID of the new input field being added
           
            newElem = $('#testingDiv' + num).clone().attr('id', 'testingDiv' + newNum).fadeIn('slow'); // create the new element via clone(), and manipulate it's ID using newNum value
        // manipulate the name/id values of the input inside the new element

        

        // button
     
        // select
        newElem.find('.test-select-label').attr('for', 'ID' + newNum + '_filters');
        newElem.find('.test-select').attr('id', 'ID' + newNum + '_filters').attr('name', 'ID' + newNum + '_filters').val('');
        
    
        
    
        // input
        newElem.find('.test-option-label').attr('for', 'ID' + newNum + '_option');
        newElem.find('.test-option').attr('id', 'ID' + newNum + '_option').attr('name', 'ID' + newNum + '_option').val('');


        // file
        newElem.find('.test-file-label').attr('for', 'ID' + newNum + '_file');
        newElem.find('.test-file').attr('id', 'ID' + newNum + '_file').attr('name', 'ID' + newNum + '_file').val('');

       
        // insert the new element after the last "duplicatable" input field
        $('#testingDiv' + num).after(newElem);

        // enable the "remove" button
        $('#btnDel').attr('disabled', false);

        // right now you can only add 5 sections. change '5' below to the max number of times the form can be duplicated
        if (newNum == 9) $('#btnAdd').attr('disabled', true).prop('value', "You've reached the limit");
    });

    $('#btnDel').click(function () {
        // confirmation
        if (confirm("Are you sure you wish to remove this section of the form? Any information it contains will be lost!")) {
            var num = $('.clonedInput').length;
            // how many "duplicatable" input fields we currently have
            $('#testingDiv' + num).slideUp('slow', function () {
                $(this).remove();
                // if only one element remains, disable the "remove" button
                if (num - 1 === 1) $('#btnDel').attr('disabled', true);
                // enable the "add" button
                $('#btnAdd').attr('disabled', false).prop('value', "ADD FILTER");
            });
        }
        return false;
        // remove the last element

        // enable the "add" button
        $('#btnAdd').attr('disabled', false);
    });

    $('#btnDel').attr('disabled', true);
    

   
   /* $(".clonedInput").change(function(){          
    var value = $(".test-select option:selected").val();
    if (value === '') return;
    var theDiv = $(".is" + value); 
    $(".test-select option:selected").attr('disabled','true');
     
    $(this).val('');
    console.log("disabled");
});
  */
    
});
   