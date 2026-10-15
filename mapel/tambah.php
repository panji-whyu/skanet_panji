<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tambah Data Mapel</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}


body{

    min-height:100vh;

    display:flex;

    justify-content:center;

    align-items:center;


    background:linear-gradient(-45deg,#007BFF,#00C6FF,#4FACFE,#6A5AF9);

    background-size:400% 400%;

    animation:gradient 10s ease infinite;

}



@keyframes gradient{

    0%{
        background-position:0% 50%;
    }

    50%{
        background-position:100% 50%;
    }

    100%{
        background-position:0% 50%;
    }

}



.container{

    width:430px;

    padding:35px;


    background:rgba(255,255,255,.18);

    backdrop-filter:blur(15px);


    border-radius:25px;


    border:1px solid rgba(255,255,255,.3);


    box-shadow:0 15px 35px rgba(0,0,0,.25);

}



h1{

    text-align:center;

    color:white;

    font-size:32px;

    margin-bottom:25px;

}



.input-group{

    margin-bottom:20px;

}



label{

    display:block;

    color:white;

    font-weight:600;

    margin-bottom:8px;

}



input{

    width:100%;

    padding:14px;


    border:none;

    border-radius:14px;


    outline:none;


    font-size:15px;


    background:rgba(255,255,255,.9);


    transition:.3s;

}



input:focus{

    transform:scale(1.03);


    box-shadow:0 0 15px rgba(255,255,255,.8);

}



.button-group{

    display:flex;

    gap:12px;

    margin-top:25px;

}



button,
.kembali{

    flex:1;


    padding:14px;


    border:none;


    border-radius:14px;


    text-align:center;


    text-decoration:none;


    color:white;


    font-size:16px;


    font-weight:600;


    cursor:pointer;


    transition:.3s;

}



button{

    background:linear-gradient(90deg,#0066ff,#00c6ff);

}



.kembali{

    background:#607d8b;

}



button:hover,
.kembali:hover{

    transform:translateY(-3px);


    box-shadow:0 10px 20px rgba(0,0,0,.25);

}



.footer{

    margin-top:25px;

    text-align:center;

    color:white;

    font-size:13px;

}

</style>

</head>


<body>


<div class="container">


<h1>➕ Tambah Data Mapel</h1>



<form action="simpan.php" method="POST">


<div class="input-group">

<label>ID Mapel</label>

<input type="text" 
name="id_mapel" 
placeholder="Masukkan ID Mapel"
required>

</div>



<div class="input-group">

<label>Nama Mapel</label>

<input type="text" 
name="mapel" 
placeholder="Masukkan Nama Mapel"
required>

</div>



<div class="button-group">


<a href="index.php" class="kembali">
⬅ Kembali
</a>


<button type="submit">
💾 Simpan
</button>


</div>



</form>



<div class="footer">

© 2026 Sistem Informasi Sekolah

</div>



</div>


</body>
</html>