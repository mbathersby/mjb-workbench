function showToolTip(content, nubPos, event){

    console.log(event);
    console.log(content);
    console.log(nubPos);

    let coords = findScreenCoords(event);

    const tooltip = document.createElement("div");
    tooltip.classList.add('slds-popover');
    tooltip.classList.add('slds-nubbin_' + nubPos);
    tooltip.setAttribute('role', 'dialog');
    tooltip.style.position = 'absolute';
    tooltip.style.top = coords.x + 'px';
    tooltip.style.left = coords.y + 'px';

    let body = document.createElement("div");
    body.classList.add('slds-popover__body');
    body.innerHTML = content;

    tooltip.appendChild(body);
    document.body.appendChild(tooltip);

        /*<!-- button class="slds-button" aria-describedby="help" aria-disabled="true">Help Text</button -->
        <div class="slds-popover slds-popover_tooltip slds-nubbin_bottom-left" role="tooltip" id="help" style="position:absolute;top:-4px;left:35px">
            <div class="slds-popover__body">
                content
            </div>
        </div>*/
}

function findScreenCoords(mouseEvent){
  var xpos;
  var ypos;

  if (mouseEvent){
    //FireFox
    xpos = mouseEvent.screenX;
    ypos = mouseEvent.screenY;
  } 
  else{
    //IE
    xpos = window.event.screenX;
    ypos = window.event.screenY;
  }
  
  console.log(xpos + ':' + ypos);
  return {'x': xpos, 'y': ypos};
}