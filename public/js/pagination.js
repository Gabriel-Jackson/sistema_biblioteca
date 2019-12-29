var rows = $('tbody tr');
var numMax = parseInt($("input[type='limit']:checked").val());

$(document).ready(function () {
    if(isNaN(numMax)){
        numMax = 5;
        $('#numMax5').attr('checked','true');
    }
    paginate();

});


$("input[name='limit']").click(function (e) { 
    numMax = parseInt($("input[type='limit']:checked").val());
    $('#pag').val(0);
    paginate();
});

$("#pageForm").submit(function (e) { 
    e.preventDefault();
});

$("#pag").change(function (e) { 
    e.preventDefault();
    paginate();
});
function changePage(btn,page){
    $('#pag').val(page);
    $(btn).addClass('active');
    paginate();
}
function paginate (){
    numMax = parseInt($("input[name='limit']:checked").val());

    
    var numPags = Math.ceil(rows.length / numMax);

    var pag = $('#pag').val();

    var iValue = parseInt(pag * numMax);
    $('tbody tr').remove();

    for(var i = iValue; i < parseInt(iValue + numMax); i ++){
        console.log(i + " " + parseInt(iValue + numMax) + " " + iValue + " " + numMax);
        if(rows.hasOwnProperty(i)){
        $(rows[i]).appendTo('tbody');
        }
    }
    $('#ulPagination li').remove();

    
    for (let i = 0; i < numPags; i++) {
        var li  = document.createElement('li');
        li.setAttribute('class','page-item');
        var btn = document.createElement('button');
        btn.setAttribute("class","btn");
        btn.innerHTML = i +1;

        $(btn).attr("onclick","changePage(this,"+i+")");
        li.appendChild(btn);
        $('#ulPagination').append(li);
    }
    
}