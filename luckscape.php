<!DOCTYPE HTML>
<html style = "min-height: 100%; margin: 0;" lang="en">
<head>
  <title>Boss Drop Log</title>
  <meta charset="utf-8">
  <script src = "../js/rs3navigation.js">
  </script>
  <script src = "../calcScape/js/log.js">
  </script>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="../css/bootstrap.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/i18n/defaults-*.min.js"></script>

  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
  <script src="//code.jquery.com/jquery-1.12.4.js"></script>

  <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>
  <style>

  </style>
</head>
<!-- http://orig03.deviantart.net/97cd/f/2016/265/7/f/runescape_the_enduring_vs_the_warden_by_racoonkun-daihe1f.jpg -->
<body id = "bgimg" style = "background-image: url('http://orig03.deviantart.net/97cd/f/2016/265/7/f/runescape_the_enduring_vs_the_warden_by_racoonkun-daihe1f.jpg');
    background-repeat: repeat-x; background-size: cover;">
  <audio id="audio" src="../calcScape/mp3/prelude.mp3" autoplay loop ></audio>

      <nav class="navbar navbar-default" style = "background-color:rgba(255, 255, 255, 0.75)">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">CalcScape</a>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="#" id = "rs3page" onclick = "redirectTo(this.id)">Home</a></li>
          <li><a href="#" id = "xp" onclick='redirectTo(this.id)'>Xp Calculator</a></li>
          <li><a href="#" id = "accuracy" onclick='redirectTo(this.id)'>Accuracy Calculator</a></li>
          <li><a href="#" id = "luckscape" onclick='redirectTo(this.id)' >Luckscape</a></li>
        </ul>
      </div>
    </nav>
    <center>
    <select class="selectpicker" data-live-search="true" id = "boss" value = "0" onchange = "play(this.value)">
     <option value="../calcScape/mp3/prelude.mp3">None</option>
     <option data-tokens="rax araxxor araxxi" value="../calcScape/mp3/araxxor.mp3">Araxxor</option>
     <option data-tokens="aod hm nex angel of death" value="../calcScape/mp3/aod.mp3">Nex:Angel of Death</option>
     <option data-tokens="kalphite king kk" value="../calcScape/mp3/kk.mp3" >Kalphite King</option>
     <option data-tokens="telos warden" value="../calcScape/mp3/anima.mp3">Telos the Warden</option>
     <option data-tokens="rago vorago" value="../calcScape/mp3/vorago.mp3">Vorago</option>
     <option data-tokens="bm beast master durzag raid raids" value="../calcScape/mp3/bm.mp3">Beastmaster Durzag</option>
     <option data-tokens="yaka syakamaru raid raids"value="../calcScape/mp3/yaka2.mp3">Yakamaru</option>
    </select>

    </center>
    <div class="container">
        <div class="row clearfix">
    		<div class="col-md-12 column">
          <table class="table table-bordered table-hover" id="tab_logic" style = "background-color:rgba(255, 255, 255, 0.65);font-size: 18px;"cellpadding="0" cellspacing="0">
    				<thead>
    					<tr >
    						<th class="text-center">
    							Kill #
    						</th>
    						<th class="text-center">
    							Image
    						</th>
                <th class="text-center">
    							Loot
    						</th>
    					</tr>
    				</thead>
    				<tbody>
    					<tr id='addr0'>
    						<td>
    						1
    						</td>
    						<td style = "height: 300px; width: 533px;">
                  <input type='file' />
<img id="myImg" src="#" alt="your image" />
    						</td>
    						<td>
                  <input type="text" name='kill0'  placeholder='Kill' class="form-control"/>
    						</td>
    					</tr>
                <tr id='addr1'></tr>
    				</tbody>
    			</table>
    		</div>
    	</div>
    	<a id="add_row" class="btn btn-default pull-left">Add Row</a><a id='delete_row' class="pull-right btn btn-default">Delete Row</a>
    </div>
 </body>
 <script>
  function temp() {
      alert("test");


  };



 $(function(){
   alert("hi");
   $(":file").change(function () {
       if (this.files && this.files[0]) {
           var reader = new FileReader();
           reader.onload = imageIsLoaded;
           reader.readAsDataURL(this.files[0]);
       }
   });
   function imageIsLoaded(e) {
       $('#myImg2').attr('src', e.target.result);
       $('#myImg2').attr('width', "533px");
       $('#myImg2').attr('height', "300px");
   };
     var x = 0;
     setInterval(function(){
         x-=1;
         $('body').css('background-position', x + 'px 0');
     }, 30);
     var i=1;
     $("#add_row").click(function(){
      $('#addr'+i).html("<td>"+ (i+1) +"</td><td style = 'height: 300px; width: 533px;'><input type='file'/><img id='myImg2' src='#' alt='your image'/></td><td><input  name='loot"+i+"' type='text' placeholder='Loot'  class='form-control input-md'></td>");

      $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      i++;
  });
     $("#delete_row").click(function(){
    	 if(i>1){
		 $("#addr"+(i-1)).html('');
		 i--;
		 }
	 });
 })
function play(id){
 var obj = document.getElementById('bgimg');
 if(id.includes("vorago"))
 {
   obj.style.backgroundImage = 'url("https://c1.staticflickr.com/6/5604/15542127625_ac01418d5c_o.jpg")';
 }
 else if(id.includes("aod")) {
   obj.style.backgroundImage = 'url("https://c1.staticflickr.com/1/290/32228507170_8e809197ff_o.jpg")';
 }
 else if(id.includes("anima"))
 {
obj.style.backgroundImage = 'url("https://mmorpg-news.net/wp-content/uploads/2016/06/runescape-telos-boss-god-wars-dungeon-2-mmorpg-news.jpg")';
 }
 else if(id.includes("yaka2"))
 {
   obj.style.backgroundImage = 'url("https://cdn.runescape.com/assets/img/external/summer-special/2015/raids.jpg")';
 }
 else if(id.includes("araxxor"))
 {
   obj.style.backgroundImage = 'url("https://c1.staticflickr.com/6/5558/15105661456_abbfb5d969_o.jpg")';
 }
 else if(id.includes("bm"))
 {
   obj.style.backgroundImage = 'url("https://c1.staticflickr.com/6/5650/22876311086_73e4206f81_o.jpg")';
 }
 else if(id.includes("kk"))
 {
   obj.style.backgroundImage = 'url("https://c1.staticflickr.com/4/3950/15723143535_22026ea5e3_o.jpg")';
 }
 else {
   obj.style.backgroundImage = 'url("http://orig03.deviantart.net/97cd/f/2016/265/7/f/runescape_the_enduring_vs_the_warden_by_racoonkun-daihe1f.jpg")';
 }
 document.getElementById('bgimg').style.backgroundSize = "cover";
 var playme = document.getElementById('audio');
 playme.src=id;
 playme.load();
     playme.play();
              }
</script>
 </html>
