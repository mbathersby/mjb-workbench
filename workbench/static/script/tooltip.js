function showToolTip(content, nubPos, event){

    console.log(event);
    console.log(content);
    console.log(nubPos);

    let elId = event.relatedTarget.id;

    let coords = findScreenCoords(event);

    const tooltip = document.createElement("div");
    tooltip.setAttribute('id', elId + '_tooltip');
    tooltip.classList.add('slds-popover');
    tooltip.classList.add('slds-nubbin_' + nubPos);
    tooltip.setAttribute('role', 'dialog');
    tooltip.style.position = 'absolute';
    tooltip.style.left = coords.x + 'px';
    tooltip.style.top = (coords.y + 10) + 'px';

    let body = document.createElement("div");
    body.classList.add('slds-popover__body');
    body.innerHTML = content;

    tooltip.appendChild(body);
    document.body.appendChild(tooltip);
    
    event.target.addEventListener("mouseout", () => {
        document.body.removeChild(tooltip);
    })
}

function findScreenCoords(mouseEvent){
  var xpos;
  var ypos;

  if (mouseEvent){
    //FireFox
    xpos = mouseEvent.x;
    ypos = mouseEvent.y;
  } 
  else{
    //IE
    xpos = window.event.x;
    ypos = window.event.y;
  }
  
  console.log(xpos + ':' + ypos);
  return {'x': xpos, 'y': ypos};
}