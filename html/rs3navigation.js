function changeL(i,d){
  var strD = d.toString();
  var strI = i.toString();
  var disp = document.getElementById(""+strD);
  var inp = document.getElementById(""+strI);
  if(strI == "stat" || strI == "tier")
  {
    inp = ((Math.pow(inp.value,3)*0.0008)+(inp.value*4)+40);
    if(strI != "stat")
    {
      inp=(inp*2.5);
    }

  }
  disp.innerHTML = Math.floor(inp);
  delete disp;
  delete inp;
}

function calcAcc()
{
  let acc = [];
  var temp2 =document.getElementById("accfinal"); //final accuracy
  var total = 1;

  for(var i = 0; i <= 3; i++)
  {
    acc.push(1);
  }
  for(i = 0; i <= 3; i++)
  {
    if(i == 0)
    {
      acc[i] = parseFloat((document.getElementById("stat")).value);
    }
    else if(document.getElementById("acc"+(i.toString())).innerHTML == "" || document.getElementById("acc"+(i.toString())).innerHTML == "1")
    {
      acc[i]=1;
    }
    else
    {
      acc[i]=(document.getElementById("acc"+(i.toString())).innerHTML);
    }
  }
  //0= stat, 1 = tier, 2 = prayer, 3 = potion
  acc[2] = (acc[2]*100.0)-100.0;
  var potmultiply = 1;
  var potadd = 0;

  if(acc[3] != "1") //potion split
  {
    var splitpot = acc[3].split(" ");
    potmultiply = parseFloat(splitpot[0]);
    potadd = parseFloat(splitpot[2]);
  }

  var stat = parseFloat(acc[0]);
  var tier = parseFloat(acc[1]);
  var pray = acc[2];
  var totalStat = Math.floor((stat*potmultiply+potadd)+pray);
  var totalCharBoost = ((Math.pow(totalStat,3)*0.0008)+(totalStat*4)+40);
  total = Math.floor(totalCharBoost+tier);

  temp2.innerHTML = total;
  onClickHandler();
  delete potmultiply;
  delete potadd;
}

function changeP(i,d)
{
  if(i.toString() == "none" || i.toString() == "1")
  {
    var valI = 1;
  }
  else if(i.toString() == "regular")
  {
    var valI = "1.08 + 1";
  }
  else if(i.toString() == "super")
  {
    var  valI = "1.12 + 2";
  }
  else if(i.toString() == "grand")
  {
    var valI = "1.14 + 2";
  }
  else if(i.toString() == "extremes")
  {
    var valI = "1.15 + 3";
  }
  else if(i.toString() == "supremes"){
    var valI = "1.16 + 4";
  }
  else if(i.toString() == "normal"){
    var valI = 1.03;
  }
  else if(i.toString() == "greater"){
    var valI = 1.05;
  }
  else if(i.toString() == "master"){
    var valI = 1.07;
  }
  else if(i.toString() == "supreme"){
    var valI = 1.10;
  }
  else if(i.toString() == "yesN"){
    var  valI = 1.05;
  }
  else if(i.toString() == "yesV"){
    var valI = 1.1;
  }
  else
  {
    var valI=parseFloat(i).toFixed(2);
  }

  var strD = d.toString();
  var disp = document.getElementById(""+strD);
  if(d == 'acc2')
  {
    disp.innerHTML = valI;
  }
  else {
    disp.innerHTML = valI;
  }
  onClickHandler();
  delete disp;
  delete inp;
}
function onClickHandler(){
  var checkedValues = $('.mod:input:checkbox:checked').map(function() {
    return this.value;
  }).get();
  var modifier = 1;
  var zeal = 0;
  if(document.getElementById("acc4").innerHTML == "")
  {
    var aura = 1;
  }
  else
  {
    var aura = parseFloat(document.getElementById("acc4").innerHTML);
  }

  if(checkedValues.indexOf("1") > -1 && checkedValues.length == 1)
  {
    var final2 = document.getElementById("accfinal2");
    var final = parseFloat(document.getElementById("accfinal").innerHTML);
    final2.innerHTML = Math.floor(((modifier)*(final))*aura+modifier*zealot()*aura);


  }
  else if(checkedValues.indexOf("1") > -1 && checkedValues.length > 1)
  {
    if(document.getElementById("zeal").checked == true)
    {
      zeal = zealot();
    }
    for(var i = 0; i<checkedValues.length; i++)
    {
      modifier *=(parseFloat(checkedValues[i]));
    }
    var final2 = document.getElementById("accfinal2");
    var final = parseFloat(document.getElementById("accfinal").innerHTML);
    final2.innerHTML = Math.floor(((modifier)*(final))*aura+modifier*zeal*aura);

  }
  else {
    for(var i = 0; i<checkedValues.length; i++)
    {
      modifier *=(parseFloat(checkedValues[i]));
    }
    if(document.getElementById("zeal").checked == true)
    {
      zeal = zealot();
    }
    var final2 = document.getElementById("accfinal2");
    var final = parseFloat(document.getElementById("accfinal").innerHTML);
    final2.innerHTML = Math.floor(((modifier)*(final))*aura+modifier*zeal*aura);

  }

}

function onClickHandler2(){
  var checkedValues = $('.aff:input:checkbox:checked').map(function() {
    return this.value;
  }).get();
  var modifier = 0;
  for(var i = 0; i<checkedValues.length; i++)
  {
    modifier +=(parseFloat(checkedValues[i]));
  }
  return modifier;
}

/*
  if(checkedValues.indexOf("1") > -1 && checkedValues.length == 1)
  {
    var final2 = document.getElementById("accfinal2");
    var final = parseFloat(document.getElementById("accfinal").innerHTML);
    final2.innerHTML = Math.floor(((modifier)*(final))*aura+modifier*zealot()*aura);


  }
  else if(checkedValues.indexOf("1") > -1 && checkedValues.length > 1)
  {
    if(document.getElementById("zeal").checked == true)
    {
      zeal = zealot();
    }
    for(var i = 0; i<checkedValues.length; i++)
    {
      modifier *=(parseFloat(checkedValues[i]));
    }
    var final2 = document.getElementById("accfinal2");
    var final = parseFloat(document.getElementById("accfinal").innerHTML);
    final2.innerHTML = Math.floor(((modifier)*(final))*aura+modifier*zeal*aura);

  }
  else {
    for(var i = 0; i<checkedValues.length; i++)
    {
      modifier *=(parseFloat(checkedValues[i]));
    }
    if(document.getElementById("zeal").checked == true)
    {
      zeal = zealot();
    }
    var final2 = document.getElementById("accfinal2");
    var final = parseFloat(document.getElementById("accfinal").innerHTML);
    final2.innerHTML = Math.floor(((modifier)*(final))*aura+modifier*zeal*aura);

  }
  */


function zealot()
{
  if(document.getElementById("prayer").value == "1.12" || document.getElementById("prayer").value == "1.10" || document.getElementById("prayer").value == "1.08")
  {
    return 0;
  }
  else {
  let acc = [];
  var total = 1;

  for(var i = 0; i <= 3; i++)
  {
    acc.push(1);
  }
  for(i = 0; i <= 3; i++)
  {
    if(i == 0)
    {
      acc[i] = parseFloat((document.getElementById("stat")).value);
    }
    else if(document.getElementById("acc"+(i.toString())).innerHTML == "" || document.getElementById("acc"+(i.toString())).innerHTML == "1")
    {
      acc[i]=1;
    }
    else
    {
      acc[i]=(document.getElementById("acc"+(i.toString())).innerHTML);
    }
  }
  //0= stat, 1 = tier, 2 = prayer, 3 = potion
  acc[2] = (acc[2]*100.0)-100.0;
  var potmultiply = 1;
  var potadd = 0;

  if(acc[3] != "1") //potion split
  {
    var splitpot = acc[3].split(" ");
    potmultiply = parseFloat(splitpot[0]);
    potadd = parseFloat(splitpot[2]);
  }
  var stat = parseFloat(acc[0]);
  var tier = parseFloat(acc[1]);
  var pray = acc[2];
  var totalStat = Math.floor((stat*potmultiply+potadd)+pray);
  var totalStatnoPray = Math.floor((stat*potmultiply+potadd));
  var totalCharBoost = ((Math.pow((totalStat),3)*0.0008)+((totalStat)*4)+40);
  var totalCharBoost2 = ((Math.pow((totalStatnoPray),3)*0.0008)+((totalStatnoPray)*4)+40);
  total = totalCharBoost+tier;
  var zealBoost = Math.floor(0.1*(totalCharBoost-totalCharBoost2));
  return zealBoost;
}
}


function redirectTo(id)
{
  document.location.href = 'file:///Users/mac/Desktop/Website/html/'+id+'.html';
}
