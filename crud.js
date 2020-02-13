var app = new Vue({
    el : "#crudapp",
    data : {
        txt : "TEEXT",
        txtkeyword : {id : ""},
        memberFetch : [],
        memberData : {id : "", name : ""}
    },
    methods: {
        getallRecord : function(){
            axios.post("api.php?crud=select")
            .then(function(res){
                app.memberFetch = res.data
            });
        },
        //-------------- Section Insert ----------------//
        rSCRH:function(){
            var kw = app.toFormData(app.txtkeyword)
            axios.post("api.php?crud=rselect",kw)
            .then(function(res){
                app.memberData.id = res.data[0].id
                app.memberData.name = res.data[0].name
            });
        },
        saveData : function(){
            var memForm = app.toFormData(app.memberData);
            //console.log(app.memberData)
            axios.post("api.php?crud=insert",memForm)
            .then(function(res){
                console.log(res.data.msg)
                if(res.data.msg){
                    app.swalsuccess("...Data Save...")
                    app.clr()
                }else{
                    app.swalerr("...Error Save Data...")
                }
            });
        },
        //------------ End Section Insert ------------//
        updateData : function(){
            var dataset = app.toFormData(app.memberData)
            axios.post("api.php?crud=update",dataset)
            .then(function(res){
                if(res.data.msg){
                    app.swalsuccess("EDIT SUCCESS")
                }
            });
        },
        deleteData:function(){
            var delKey = app.toFormData(app.memberData)
            axios.post("api.php?crud=delete",delKey)
            .then(function(res){
                if(res.data.msg){
                    alert("Data Deleted....")
                }
                console.log(res.data.msg)
            });
        },
        //------------ Set Form Data --------//
        toFormData: function(obj){
			var form_data = new FormData();
			for(var key in obj){
				form_data.append(key, obj[key]);
            }
			return form_data;
        },
        //------------ End --------------------//
        //-------------- Clear Form -----------//
        clr:function(){
            app.memberData = ""
        },
        chk:function(){
            console.log("TEST")
            alert()
            
        },
        //-------------- End Clear Form -------//

        //------------ Sweet Alert -------------//
        swalsuccess : function(txt){
            Swal.fire({icon: 'success',title: txt})
        },
        swalerr : function(txt){
            Swal.fire({icon: 'error',title: txt})
        }
        //------------- End Sweet Alet ---------//
    }

})