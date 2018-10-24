$('#calc_button').click(function(){
    var score_disp = $('#score_disp_cont');
    score_disp.empty();
    $.ajax({
        type:"POST",
        url:"./php/calc_heuristics.php",
        success: function(data){
            score_disp.append(data);
        }
    })
});