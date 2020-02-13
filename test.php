<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEST</title>
    <link rel="stylesheet" href="bootstrap-4.4.1/css/bootstrap.css">
</head>
<body>
    <br><br>
    <div class = "container">
        <div class = "row">
                <h1 class = "col-md-12 col-md-offset-4"><center>TEST</center></h1>
            <br><br><br><br>
        </div>
    </div>

    <div id = "crudapp"> <!-------Start Vue-------->
        <h1>{{txt}}</h1>
        <input type="text" name="" id="" v-on:keyup="test">
        <button v-on:click="test">TEST</button>
    </div> <!-------End Vue-------->
</body>
<script src="script/vue.js"></script>
<script src="script/jquery-3.4.1.js"></script>
<script src="script/axios.js"></script>
<script src="bootstrap-4.4.1/js/bootstrap.js"></script>
<script>
var app = new Vue({
    el : "#crudapp",
    data:{
        txt : "TEST"
    },
    methods:{
        test:function(){
            alert()
        }
    }
})
</script>
</html>