<!DOCTYPE html>
<html lang="en">
<head>
  <title>Accuracy Calculator</title>
  <meta charset="utf-8">
  <script src = "../html/rs3navigation.js">
  </script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.js"></script>
</head>
<body>
  <?php include "dbprocess2.php" ?>
  <div class="container-fluid">
    <nav class="navbar navbar-default">
      <div class="container-fluid" >
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
    <table class = "table table-condensed table-bordered" style = "font-size: 18px;"cellpadding="0" cellspacing="0">
      <tbody>
        <tr>
          <td width = "40%">Attack/Range/Magic Level</td>
          <td> <input type="text" id="stat" value = "1" onload="changeL(this.id, 'acc0');calcAcc();" onkeyup="changeL(this.id, 'acc0');calcAcc();">
            <td align="center" id = "acc0"></td>
          </tr>
          <tr>
            <td>Weapon Tier</td>
            <td> <input type="text" id="tier" value = "1" onload = "changeL(this.id, 'acc0');calcAcc();" onkeyup="changeL(this.id, 'acc1');calcAcc();">
              <td align="center" id = "acc1"></td>
            </tr>
            <tr>
              <td>Attack Style (must choose to calculate boss's affinity)</td>
              <td>
                <select class="form-control" id = "sty" style = "width: 164px; text-transform: lowercase;" value = "None">
                  <option  value="-1">None</option>
                  <option value="stab">Stab</option>
                  <option value="slash">Slash</option>
                  <option value="crush">Crush</option>
                  <option value="arrow">Arrow</option>
                  <option value="bolt">Bolt</option>
                  <option value="thrown">Thrown</option>
                  <option value="air">Air</option>
                  <option value="fire">Fire</option>
                  <option value="water">Water</option>
                  <option value="earth">Earth</option>
                </select>
              </td>
              <td id = "accnone" align="center"width = "10%"></td>
            </tr>
            <tr>
              <td>Prayer</td>
              <td>
                <select class="form-control" id = "prayer" style = "width: 164px" value = "1" onmousedown="this.value='';" onchange="changeP(this.value, 'acc2');calcAcc();">
                  <option value='none'>None</option>
                  <option id = "t1" value='1.02'>T1 Single Boosting Prayer</option>
                  <option id = "t2" value='1.04'>T2 Single Boosting Prayer</option>
                  <option id = "t3" value='1.06'>T3 Single Boosting Prayer</option>
                  <option id = "leech" value='1.05'>Leech Curses(Maxed Out)</option>-->
                  <option id = "t70" value='1.08'>Piety/Rigour/Augury</option>
                  <option id = "curse" value='1.10'>Turmoil/Anguish/Torment</option>
                  <option id = "praesul" value='1.12'>Malevolence/Desolation/Affliction</option>
                </select>
              </td>
              <td align="center" id = "acc2"></td>
            </tr>
            <tr>
              <td>Potion</td>
              <td>
                <select class="form-control" id = "potion" style = "width: 164px" value = "1" onmousedown="this.value='';" onchange="changeP(this.value, 'acc3');calcAcc();">
                  <option value="none">None</option>
                  <option value="regular">Regular</option>
                  <option value="super">Super</option>
                  <option value="grand">Grand</option>
                  <option value="extremes">Extremes/Overload</option>
                  <option value="supremes">Supremes/Overload(Supreme)</option>
                </select>
              </td>
              <td align="center" id = "acc3"></td>

            </tr>
            <tr>
              <td>Base Accuracy:</td>
              <td></td>
<td style = "font-size: 24px;font-weight:bold;"align="center"id = "accfinal"> 1 </td>
            </tr>
            <tr>
              <td>Aura</td>
              <td>
                <select class="form-control" id = "aura" style = "width: 164px" value = "1" onmousedown="this.value='';" onchange="changeP(this.value, 'acc4');onClickHandler(); acc();">
                  <option value="none">None</option>
                  <option value="normal">Normal</option>
                  <option value="greater">Greater</option>
                  <option value="master">Master</option>
                  <option value="supreme">Supreme or Berserker/Maniacal/Reckless</option>
                </select>
              </td>
              <td align="center" id = "acc4"></td>
            </tr>
            <tr>
              <td style = "text-align: center; font-size: 24px; padding-top:3.5%; font-weight: bold;"> Accuracy Modifiers <br>(stacks multiplicatively):</td>
              <td>
                <script type="text/javascript">
                $(document).ready( function a()
                {
                  changeL("stat", 'acc0')
                  changeL("tier", 'acc1')
                  calcAcc();
                  $("#med").change(function() {
                    if($(this).prop('checked') == true) {
                      $("#zeal").attr('disabled',true);
                      $("#reap").attr('disabled',true);

                    }
                    if($(this).prop('checked') == false){

                        $("#zeal").attr('disabled',false);
                        $("#reap").attr('disabled',false);
                    }
                  });

                  $("#zeal").change(function() {
                    if($(this).prop('checked') == true) {
                      var final2 = document.getElementById("accfinal2");
                      changeP(($('#prayer option:selected').val()),'acc2');
                      calcAcc();
                      onClickHandler();
                      $('#curse').prop('disabled', true);
                      $('#praesul').prop('disabled', true);
                      $('#t70').prop('disabled', true);
                      $("#med").attr('disabled',true);
                      $("#reap").attr('disabled',true);

                    }
                    if($(this).prop('checked') == false){
                      $("#reap").attr('disabled',false);
                      $("#med").attr('disabled',false);
                      $('#curse').prop('disabled', false);
                      $('#praesul').prop('disabled', false);
                      $('#t70').prop('disabled', false);
                      changeP($('#prayer option:selected').val(),'acc2');
                      calcAcc();
                      onClickHandler();
                    }
                  });

                  $("#inf").change(function() {
                    if($(this).prop('checked') == true) {
                      $("#sup").attr('disabled',true);
                    }
                    if($(this).prop('checked') == false && ($("#sup").prop('checked') == false)){
                      $("#sup").attr('disabled',false);
                    }
                  });
                  $("#reap").change(function() {
                    if($(this).prop('checked') == true) {
                      $("#med").attr('disabled',true);
                      $("#zeal").attr('disabled',true);

                    }
                    if($(this).prop('checked') == false){
                      $("#med").attr('disabled',false);
                      $("#zeal").attr('disabled',false);
                    }
                  });
                  $("#sup").change(function() {
                    if($(this).prop('checked') == true) {
                      $("#inf").attr('disabled',true);
                    }
                    if($(this).prop('checked') == false && ($("#inf").prop('checked') == false)){
                      $("#inf").attr('disabled',false);
                    }
                  });
                  $("#void").change(function() {
                    if($(this).prop('checked') == true) {
                      $("#might").attr('disabled',true);
                    }
                    if($(this).prop('checked') == false && ($("#might").prop('checked') == false)){
                      $("#might").attr('disabled',false);
                    }
                  });
                  $("#might").change(function() {
                    if($(this).prop('checked') == true) {
                      $("#void").attr('disabled',true);
                    }
                    if($(this).prop('checked') == false && ($("#void").prop('checked') == false)){
                      $("#void").attr('disabled',false);
                    }
                  });
                  $('#prayer').on('change', function() {
                    if($('#zeal').prop('checked') == true) {
                      $("#inf").attr('disabled',true);
                    }

                    //  var value = $(this).val();
                    //  alert(value);
                  });

                });
                </script>
                <label><input name = "mod" type="checkbox" id="nihil" onclick="onClickHandler();"value="1.05" /> Nihil</label>
                <label><input name = "mod" type="checkbox" id="def" onclick="onClickHandler()"value="1.03" /> Defender</label>
                <label><input name = "mod" type="checkbox" id="med"  onclick="onClickHandler()"value="1.01" /> Extreme Dominion Medallion</label><br>
                <label><input name = "mod" type="checkbox" id="inf"  onclick="onClickHandler()" value="1.02" /> Inferior Accuracy Scrimshaw</label>
                <label><input name = "mod" type="checkbox" id="sup"  onclick="onClickHandler()" value="1.04" /> Superior Accuracy Scrimshaw</label>
                <label><input name = "mod" type="checkbox" id="void" onclick="onClickHandler()"value="1.03" /> Void (any set)</label>
                <label><input name = "mod" type="checkbox" id="might" onclick="onClickHandler()"value="1.14" /> Mighty Slayer Helmet</label>
                <label><input name = "mod" type="checkbox" id="zeal" value = "1"/> Amulet of Zealots</label>
                <label><input name = "mod" type="checkbox" id="ess" onclick = "calcAcc();" /> Berserk Blood Essence (treats overload options as regular extremes/supremes)</label>
              </td>
              <td>
              </td>
            </tr>
            <tr>
<td style = "text-align: center; font-size: 24px; padding-top:3.5%; font-weight: bold;">
  Affinity/Hit Chance Modifiers </br>(stacks additively):
</td>
              <td class = "table-bordered" style = "border-collapse: collapse;">
                <label><input name = "aff" type="checkbox" id="quake" onclick="onClickHandler2()"value="2" /> Quake (1 min)</label>
                <label><input name = "hit" type="checkbox" id="reap" value = "3"/> Reaper's Necklace (max stacks)</label>
                <label><input name = "aff" type="checkbox" id="hammer" onclick="onClickHandler2()"value="5" /> Statius Warhammer Special (5 min)</label>
                <label><input name = "aff" type="checkbox" id="bandos"  onclick="onClickHandler2()"value="3" /> Bandos Book Special (12 secs)</label>
                <label><input name = "aff" type="checkbox" id="guthix"  onclick="onClickHandler2()" value="2" /> Guthix Staff Special (1 min)</label>
                <label><input name = "aff" type="checkbox" id="hatchet"  onclick="onClickHandler2()" value="3" /> Dragon Hatchet Special </label>
                <label><input name = "aff" type="checkbox" id="anchor" onclick="onClickHandler2()"value="3" /> Barrelchest Anchor Special </label>&nbsp;&nbsp;
                <label><input name = "aff" type="checkbox" id="dagger" onclick="onClickHandler2()"value = "2"/> Bone dagger Special</label>
                <label><input name = "hit" type="checkbox" id="ability" value = "25"/> Offensive Ultimate Ability</label>
              </td>
              <td>
              </td>
            </tr>

          </tbody>

        </table>

        <table style = "borders: 0px;" class = "table" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <h3 style = "vertical-align: top;"><i>Select a Boss:</i> </h3>
              <td style="white-space: nowrap;font-size:20px;" width = "36%">
                <select style = "" onmousedown = "this.value='';" data-live-search="true" data-live-search-style="startsWith" class="form-control selectpicker" id = "bossname" value = -1 >
                  <option value = -1> None </option>
                </select>
                <center>
                  <img style = "display: block;"height = "405" width = "280" style = "image-resolution: 72dpi; "id = "bossimg" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7">
                </center>
                <table class = "table" style = "padding:0px; margin:0px;font-size: 8px; font-style: italic|bold;">
                  <strong>
                    <th>
                      Defence Level
                    </th>
                    <th>
                      Armour
                    </th>
                    <th>
                      Weakness
                    </th>
                    <th>
                      Weakness (affinity)
                    </th>
                    <th>
                      Melee (affinity)
                    </th>
                    <th>
                      Range (affinity)
                    </th>
                    <th>
                      Mage (affinity)
                    </th>
                  </strong>
                  <tbody>
                    <tr style = "font-size: 20px; font-weight: bold; text-align: center;">
                      <center>
                        <td style = "color: gray" id = "defence"> 0</td>
                        <td style = "color: gray"id = "armour"> 0 </td>
                        <td style = "" id = "weakness"> 0 </td>
                        <td style = "" id = "weaknessA"> 0 </td>
                        <td style = "color: red;"id = "melee"> 0 </td>
                        <td style = "color: green;"id = "range"> 0 </td>
                        <td style = "color: blue;"id = "mage"> 0 </td>
                      </center>
                    </tr>
                  </tbody>
                </table>

              </td>
              <td style = "
              padding: 0;
              margin: 0;
              border: 0px;
              border-collapse: collapse;">
              <table class = "">
                <tr>
                  <th> <!-- video-->

<iframe id="bossvid" width="300%" height="507" src="https://www.youtube.com/embed/g2NVY2mFv_0" frameborder="0" allowfullscreen></iframe>
                  </th>
                </tr>
  </table>

</td>
</tr>
</tbody>
</table>
<table class = "table">
  <tr>
    <td  style = "font-size: 24px; width: 24%;display: inline-block; height: 100%; text-align: center;">
    <strong>
    Your Total Accuracy:
    <center>
    <p style = "font-size: 28px; color: red; display: inline-block; height: 100%;" id = "accfinal2"> 0 </p>
    </center>
    </strong>
    </td>

    <td   style = "font-size: 24px; width: 24%;text-align: center;display: inline-block; height: 100%;">
  <strong>
  Boss's total armour Stat:
  <center>
  <p style = "font-size: 28px; color: green;" id = "bossarmour"> 0 </p>
  </center>
  </strong>
  </td>

    <td style = "font-size: 24px; width: 24%;display: inline-block; height: 100%;text-align: center;">
  <strong>
  Boss's current affinity:

  <center>
  <p style = "font-size: 28px; color: red;" id = "bossaff"> 0 </p>
  </center>
  </strong>
  </td>

    <td  style = "font-size: 24px; width: 28%;display: inline-block; height: 100%; text-align: center;">
  <strong>
  Your Hit Chance:
  <center>
  <p style = "font-size: 40px; color: red; display: inline-block; height: 100%;" id = "hc"> 0.0% </p>
  </center>
  </strong>
  </td>
</tr>
</table>



<p style = "text-align: center;"><i>Credit goes to Chi Pa Pa for the boss data table, the Runescape Wiki for the boss images/data, <br>
    and the Runescape Youtube Channel for all the boss related videos. </i></p>
    <footer style = "text-align: center;"><i>&copy; Copyright 2017 CalcScape. All rights reserved.</i></footer>


<script type="text/javascript">
var select = document.getElementById("bossname");
var obj = <?php echo json_encode($name); ?>;
var defence = <?php echo json_encode($def); ?>;
var armour = <?php echo json_encode($arm); ?>;
var weakness = <?php echo json_encode($weak); ?>;
var weakaffinity = <?php echo json_encode($waff); ?>;
var style1 = <?php echo json_encode($melee); ?>;
var style2 = <?php echo json_encode($range); ?>;
var style3 = <?php echo json_encode($mage); ?>;
var image = <?php echo json_encode($img); ?>;
var video = <?php echo json_encode($vid); ?>;

for(var i = 0; i < obj.length; i++) {
  var opt = obj[i];
  var el = document.createElement("option");
  el.textContent = opt;
  el.id = i;
  el.value = opt;
  select.appendChild(el);
}
$(document).ready(function(){
  var prevName = (document.getElementById('bossname')).value;

  var prevStat = -1;
  var initialW = $("#bossimg").width();
  var bossweak;
  $("#bossname").change(function() {
    var tempName = this.value;
    var tempStats = obj.indexOf(tempName);
    if(tempStats == -1)
    {
      document.getElementById("defence").innerHTML = "0";
      document.getElementById("armour").innerHTML = "0";
      document.getElementById("weakness").innerHTML = "0";
      document.getElementById("weaknessA").innerHTML = "0";
      document.getElementById("melee").innerHTML = "0";
      document.getElementById("range").innerHTML = "0";
      document.getElementById("mage").innerHTML = "0";
      $("#bossimg").attr('src', 'data:image/gifs;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7');
      $("#bossvid").attr("src", "https://www.youtube.com/embed/g2NVY2mFv_0");
    }
    else {
      $("#bossimg").attr('src', image[tempStats]);

      if(video[tempStats].toString() == "1")
      {
        $("#bossvid").attr("src", "https://www.youtube.com/embed/g2NVY2mFv_0?autoplay=1&controls=0&showinfo=0&loop=1&rel=0");
      }
      else {
        $("#bossvid").attr("src", video[tempStats]);
      }
      for(var i = 0; i<=6; i++)
      {
        if(i==0)
        {
          document.getElementById("defence").innerHTML = defence[tempStats];
        }
        else if (i==1) {
          document.getElementById("armour").innerHTML = armour[tempStats];
        }
        else if (i==2) {
          document.getElementById("weakness").innerHTML = weakness[tempStats];
        }
        else if (i==3) {
          document.getElementById("weaknessA").innerHTML = weakaffinity[tempStats];
        }
        else if (i==4) {
          document.getElementById("melee").innerHTML = style1[tempStats];
        }
        else if (i==5) {
          document.getElementById("range").innerHTML = style2[tempStats];
        }
        else {
          document.getElementById("mage").innerHTML = style3[tempStats];
        }
      }
    }
    if((prevStat == -1) && (tempStats > -1 && tempStats < 4)) //from  none to araxxor
    {

      var temp = $("#bossimg").height();
      $("#bossimg").attr('width', temp);
      delete temp;
    }
    else if((tempStats == -1) && (prevStat > -1 && prevStat < 4)) //from araxxor to none
    {
      var temp = $("#bossimg").width();
      $("#bossimg").attr('width', initialW);
      delete temp;
    }

    else if((tempStats > 3) && (prevStat > -1 && prevStat < 4)) //from araxxor to others
    {
      var temp = $("#bossimg").width();
      $("#bossimg").attr('width', initialW);
      delete temp;
    }

    else if(( prevStat == -1) && (tempStats > 3)) //from none to others
    {
    }

    else if(( prevStat > 3) && (tempStats > -1 && tempStats < 4)) //from others to araxxor
    {
      var temp = $("#bossimg").height();
      $("#bossimg").attr('width', temp);
      delete temp;
    }

    else if (( prevStat > 3) && (tempStats == -1)) //from others to none
    {

    }
    bossweak = document.getElementById("weakness").innerHTML;
    prevName = tempName;
    prevStat = tempStats;
  });
  function acc()
  {
  var affinity = parseFloat(onClickHandler2());
  var valW = parseInt(document.getElementById("weaknessA").innerHTML);
  var valmelee = parseInt(document.getElementById("melee").innerHTML);
  var valrange = parseInt(document.getElementById("range").innerHTML);
  var valmage = parseInt(document.getElementById("mage").innerHTML);
  var selectedValue = document.getElementById("sty").value;
  var bossdef = parseFloat(document.getElementById("defence").innerHTML)
  var bossarm = parseFloat(document.getElementById("armour").innerHTML)
  if(selectedValue.toString() == (bossweak.toString()))
  {
    affinity = affinity + valW;
  }
  else {
    if((selectedValue.toString() == "fire") || (selectedValue.toString()  == "water") || (selectedValue.toString()  == "air") || (selectedValue.toString()  == "earth"))
    {
      affinity = affinity + valmage;
    }
    else if ((selectedValue.toString()  == "stab") || (selectedValue.toString()  == "slash") || (selectedValue.toString()  == "crush")) {
      affinity = affinity + valmelee;
    }else if ((selectedValue.toString()  == "bolt") || (selectedValue.toString()  == "arrow") || (selectedValue.toString()  == "thrown")) {
      affinity = affinity + valrange;
    }
    else if(selectedValue.toString() == "-1")
    {
      affinity = 0;
    }
    else
    {
      affinity = affinity + valW;
    }
  }
  bossdef = Math.round((0.0008*(bossdef*bossdef*bossdef))+(4*bossdef)+40);

  if(bossarm > 100)
  {

  }
  else {
    bossarm = Math.round(2.5*((0.0008*(bossarm*bossarm*bossarm))+(4*bossarm)+40));
  }
  var totaldef = bossdef+bossarm;
  if(totaldef != 0 && document.getElementById('bossname').value == -1)
  {
    totaldef = 0;
  }
  var youracc =  parseFloat(document.getElementById("accfinal2").innerHTML);
  var str = parseInt((affinity*(youracc/totaldef)));
  var post = document.getElementById('hc');
  var accf = document.getElementById('accfinal2');
var reap = 0;
var ult = 0;
var wave = 0;
  document.getElementById('bossarmour').innerHTML = totaldef.toString();
  document.getElementById('bossaff').innerHTML = affinity.toString();

  if(document.getElementById('reap').checked)
  {
    str += 3;
  }
  if(document.getElementById('ability').checked)
  {
    str += 25;
  }
  if(isNaN(str))
  {
    str = 0;
  }
  post.innerHTML = ((str.toFixed(1))).toString()+"%";
  var tdef= document.getElementById('bossarmour');
  var baff = document.getElementById('bossaff');

  if(parseInt(tdef.innerHTML) >= 3000)
  {
  tdef.style.color = 'red';
  }
  else if (parseInt(tdef.innerHTML) >= 2000 && parseInt(tdef.innerHTML) < 3000)
  {
    tdef.style.color = 'orange';
  }
else if (parseInt(tdef.innerHTML) >= 1500 && parseInt(tdef.innerHTML) < 2000)
  {
    tdef.style.color = 'gold';
  }
  else
  {
    tdef.style.color = 'lime';
  }

  if(parseInt(accf.innerHTML) >= (1.2*parseFloat(tdef.innerHTML)))
  {
  accf.style.color = 'lime';
  }
  else if (parseInt(accf.innerHTML) >= (0.8*parseFloat(tdef.innerHTML)) && parseInt(accf.innerHTML) < (1.2*parseFloat(tdef.innerHTML)))
  {
    accf.style.color = 'gold';
  }
  else
  {
    accf.style.color = 'red';
  }

  if(parseInt(baff.innerHTML) >= 60)
  {
  baff.style.color = 'lime';
  }
  else if (parseInt(baff.innerHTML) >= 50 && parseInt(baff.innerHTML) < 60)
  {
    baff.style.color = 'gold';
  }
else if (parseInt(baff.innerHTML) >= 40 && parseInt(baff.innerHTML) < 50)
  {
    baff.style.color = 'orange';
  }
  else if (parseInt(baff.innerHTML) < 40)
  {
    baff.style.color = 'red';
  }


  if(str.toFixed(1) < 25.0 )
  {
post.style.color = 'red';
  }
  else if (str.toFixed(1) >= 25.0 && str.toFixed(1) < 50.0)
  {
    post.style.color = 'orange';
  }
  else if (str.toFixed(1) >= 50.0 && str.toFixed(1) < 75.0)
  {
    post.style.color = 'gold';
  }
  else if (str.toFixed(1) >= 75.0)
  {
    post.style.color = 'lime';
  }

  }

  $("#stat, #tier").keyup(function(){
acc();
});
$("#sty, #bossname, #aura, #prayer, #potion, #reap, #ability").change(function(){
acc();
});
  $('input[type="checkbox"]').click(function(){
    acc();
  });
});

</script>
</div>

</body>
</html>
