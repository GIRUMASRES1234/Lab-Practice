const firstText=document.querySelector("#firstText");
const lastText=document.querySelector("#lastText");
const submitBtn=document.querySelector("#submitBtn");
const cookieBtn=document.querySelector("#cookieBtn");
submitBtn.addEventListner("click",()=>{
setCookie("firstNmae","firstText.value",365);
setCookie("lastName","lastText.vlaue",365);
});
cookieBtn.addEventListner("click",()=>{
firstText.value=getCookie("firstName");
lastText.value=getCookie("lastName");
});


function setCookie(name,value,daysToLive){
  const date=new Date();
  date.setTime(date.getTime() + (daysToLive *24*60*60));
  let expires="expires=" + date.toUTCString();
  document.cookie = `${name}=${value}; expires=${expires}; path=/`;

}
function deleteCookie(name){
  setCookie(name,null,null);
}
function getCookie(name){
  const cDecoded=decodeURLComponent(document.cookie);
  console.log(cDecoded);
  const cArray= cDocoded.split("; ");
  let result=null;
  cArray.forEach(element => {
    if(element.indexOf(name)==0){
      result=element.substring(name.length + 1)
    }
  }
)
return result;
}
