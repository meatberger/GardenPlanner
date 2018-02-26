/*
 * global.js
 * © Andrew Berger, Pellissippi State Community College
 * All global Javascript methods should go here
 */
function ajaxCall(url)
{
    if(var1!==false){url=url+'?'+var1Name+'='+var1;}
    if(var2!==false){url=url+'&'+var2Name+'='+var2;}
    $.ajax(
    {
    async:true, url:url,success:function(result)
        {
        json = result;
    }
    } )
        .done(function(msg)
    {
        done = true;
     
        switch(msg)
        {
        }
            ajaxDone();
    });
}