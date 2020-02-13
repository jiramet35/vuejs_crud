<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VueJS HTML && PHP CRUD Project</title>
    <link rel="stylesheet" href="bootstrap-4.4.1/css/bootstrap.css">
    <link rel="stylesheet" href="script/sweetalert2/package/dist/sweetalert2.css">
</head>
<body>
    <br><br>
    <div class = "container">
        <div class = "row">
                <h1 class = "col-md-12 col-md-offset-4"><center>VueJS HTML && PHP CRUD Project</center></h1>
            <br><br><br><br>
        </div>
    </div>

    <div id = "crudapp"> <!-------Start Vue-------->
        <div class = "container">
            <div class = "row">
                <div class = "col-md-12"> <!------ Form Data ------->
                    <center>
                    <table>
                        <tr>
                            <td>รหัสประจำตัว :</td>
                            <td><input type="text" v-model="memberData.id"></td>
                        </tr>
                        <tr>
                            <td>ชื่อ - สกุล :</td>
                            <td><input type="text" v-model="memberData.name"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <br>
                                <button class = "btn btn-success" v-on:click="getallRecord">ALL MEMBER</button>
                                <button class = "btn btn-primary" v-on:click="saveData">SAVE</button>
                                <button class = "btn btn-warning" v-on:click="updateData">EDIT</button>
                                <button v-on:click="deleteData">DELETE</button>
                            </td>
                        </tr>
                    </table>
                    </center>
                </div> <!------ END END Formdata ------->

                
                <div class = "col-md-12"> <!------ TABLE SHOWDATA ------->
                <br><br>
                    <center>
                    ค้นหา : <input type="text" v-on:keyup="rSCRH" v-model="txtkeyword.id">
                    <br><br>
                    <table border = "1">
                        <th>รหัส</th>
                        <th>ชื่อ - สกุล</th>
                        <tr v-for="datashow in memberFetch">
                            <td>{{ datashow.id }}</td>
                            <td>{{ datashow.name }}</td>
                        </tr>
                    </table>
                    </center>
                </div> <!---- END TABLE SHOWDATA ------->

            </div>
        </div>
    </div> <!-------End Vue-------->
</body>
<script src="script/vue.js"></script>
<script src="script/jquery-3.4.1.js"></script>
<script src="script/axios.js"></script>
<script src="bootstrap-4.4.1/js/bootstrap.js"></script>
<script src="script/sweetalert2/package/dist/sweetalert2.js"></script>
<script src="crud.js"></script>
</html>