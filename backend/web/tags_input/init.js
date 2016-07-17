$(document).ready(function() {
   
    $('.tags').tagsInput({
        width: 'auto',
        height: '45px',
        defaultText:'',
        maxChars:255,
//        defaultText:'add new',
//        onAddTag: function(elem)
//        {
//                var tags_length = $(this).next(".tagsinput").find('.tag').length;
////                var text_new = $(this).next(".tagsinput").find('div').find('input');
//                if(tags_length > 4){
//                    $('.tags').removeTag(elem);
//                    alert("maximum 4 lines");
//                }
//        }
    });  
    
});
