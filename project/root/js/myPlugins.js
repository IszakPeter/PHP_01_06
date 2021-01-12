(function($) {
    $.fn.PopUpAlert = function(options) {
        var defaultOps= {
            header:"",
            message:"",
            type:"info", // info warning error 
            liveTime:0, //second
            animTime:400,
            close:function(){  _close() }
        }

        options = $.extend({}, defaultOps, options)
        var id  = $(this).attr("id")
        var count =  $("#"+id+" > .toast").length          
        var alertId = id+"_"+(count+1); 

        var time=new Date().toLocaleTimeString('hu-HU', { hour12: false,  year:'numeric', month:'numeric', day:'numeric', hour: "numeric",  minute: "numeric"});

        let alertHtml = `<div id="${alertId}" class="toast fade text-dark ${options.type} text-break" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">
                                <strong class="mr-auto">${options.header}</strong>
                                <small class="text-muted">${time}</small>
                                <button type="button" class="ml-2 mb-1 close" id="${alertId}_cb" >
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="toast-body">
                                ${options.message}
                            </div>
                       </div>`
        $(this).append(alertHtml)
        $("#"+alertId).toast({autohide:false, delay:options.animTime })
        $("#"+alertId).toast('show')
        if(options.liveTime>0){
            setTimeout(function(){ options.close()},options.liveTime*1000)
        }
        $("#"+alertId+"_cb").click(function(){
            options.close()
        })

        function _close(){
            $("#"+alertId).toast('hide')
            $("#"+alertId).on('hidden.bs.toast', function(){ $(this).remove() })
            }
    }
   
    $.fn.CustomSelect = function (options) {
        let def = {
            title: "Teszt",
            button: "SEND",
            dataSource: [],
            itemClick: function (items) {
                _onclick(items);
            }

        }
        let content = $(this)
        options = $.extend({}, def, options)
        content.append(`<div id="title">${options.title}</div>`)
        let conId = content.attr('id')
        options.dataSource.forEach(function (data, index) {
            let itemId = `${conId}-item-${data.id ? data.id : index}`
            let itemString = `<div class="item" data-item-ID="${data.id ? data.id : index}" id="${itemId}">
                                <div id="head">
                                    ${data.header}
                                </div>           
                                <div id="times">
                                ${data.startTime}-${data.endTime}
                                </div>
                                <div id="place">
                                    ${data.place}
                                </div>
                                <div id="date">
                                    ${data.date}
                                </div>
                                <div class="break"></div>
                                <div id="body">
                                ${data.body}
                                </div>
                            </div>`

            content.append(itemString)
            $("#" + itemId).addClass("item-" + index % 2)
            $("#" + itemId).click(function () {
                $(this).toggleClass("active")
            })
        })

        let button = `<div id="button">${options.button}</div>`
        content.append(button)

        $("#button").click(function () {
            let actives = $(`#${conId} .active`)
            $(`#${conId} .active`).removeClass("active")
            options.itemClick($.map(actives, (v) => $(v).attr("data-item-ID")))
        })
        function _onclick(items) {
            console.log(items)
        }
    }

    
}(jQuery))





/*



*/ 