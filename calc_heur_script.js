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
$(document).ready(function(){
    var heuristic_display = $('#heuristic_table');
    heuristic_display.empty();
    $.ajax({
        type:"POST",
        url:"./php/get_heuristics_listing.php",
        success: function(data){
            heuristic_display.append(data);
        }
    });
});