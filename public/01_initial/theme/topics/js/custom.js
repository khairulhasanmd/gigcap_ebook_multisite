(function($){
    $(document).ready(function(){

        $("[class*='topic-collapse-']").click(function(){
            var id= $(this).attr("data-id");
            $('.subtopics-'+id).slideToggle(100);
            $('.expand-'+id).toggle();
            $('.collapse-'+id).toggle();
        });

    });
})(jQuery)
