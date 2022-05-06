
function CreateRequest() {
  var request = null;
  try
  {
    //создаем объект запроса для Firefox, Opera, Safari
    request = new XMLHttpRequest();
  }
  catch (e)
  {
    //создаем объект запроса для Internet Explorer
    try
    {       request=new ActiveXObject("Msxml2.XMLHTTP");
    }
    catch (e)
    {
      request=new ActiveXObject("Microsoft.XMLHTTP");
    }
  }
  return request;
};