function showToolTip(content, nubPos){

    console.log(this.Event);
    console.log(content);
    console.log(nubPos);

    findScreenCoords(this.MouseEvent);

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
}