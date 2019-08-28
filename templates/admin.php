<h1>Text Formatting</h1>
<div class="dropdown">
    <button onclick="myFunction()" class="dropbtn">Chose what to edit</button>
    <div id="myDropdown" class="dropdown-content">
        <a onclick="changeTitle('p')">p</a>
        <a onclick="changeTitle('h1')">h1</a>
        <a onclick="changeTitle('h2')">h2</a>
        <a onclick="changeTitle('h3')">h3</a>
        <a onclick="changeTitle('h4')">h4</a>
        <a onclick="changeTitle('h5')">h5</a>
        <a onclick="changeTitle('h6')">h6</a>
    </div>
    <br>
    <br>
    <form>
        <p>Font Color</p>
        <input type="text" value="#bada55" class="my-color-field" data-default-color="#effeff" name="fontColor"/>
        <p>Transform</p>
        <fieldset id="transformGroup">
            <input type="radio" value="none" name="transformGroup">None
            <input type="radio" value="uppercase" name="transformGroup">UpperCase
            <input type="radio" value="capitalize" name="transformGroup">Capitalise
            <input type="radio" value="lowercase" name="transformGroup">Lowercase
        </fieldset>
        <p>Alignment</p>
        <fieldset id="alignmentGroup">
            <input type="radio" value="left" name="alignmentGroup">Left
            <input type="radio" value="center" name="alignmentGroup">Center
            <input type="radio" value="right" name="alignmentGroup">Right
            <input type="radio" value="justify" name="alignmentGroup">Justify
        </fieldset>
        <p>Font Size</p>
        <div class="slider">
            <input type="range" id="fontSize" min="1" max="50" step="1" name="fontSize"><span></span>
        </div>
        <p>Line Height</p>
        <div class="slider">
            <input type="range" id="lineHeight" min="1" max="50" step="1" name="lineHeight"><span></span>
        </div>
        <p>Letter Spacing</p>
        <div class="slider">
            <input type="range" id="letterSpacing" min="1" max="50" step="1" name="letterSpacing"><span></span>
        </div>
        <p>Background Color</p>
        <input type="text" value="#bada55" class="my-color-field" data-default-color="#effeff" name="backgroundColor"/>
        <p>Border</p>
        <input type="text" value="#bada55" class="my-color-field" data-default-color="#effeff" name="borderColor"/>
        <input type="number" min="1" max="10" name="borderWidth"/>
        <fieldset id="borderGroup">
            <input type="radio" value="solid" name="borderGroup">Solid
            <input type="radio" value="dashed" name="borderGroup">Dashed
            <input type="radio" value="dotted" name="borderGroup">Dotted
        </fieldset>
        <p>Corner Number</p>
        <input type="number" min="1" max="10" name="cornerNumber"/>
        <br>
        <input type="hidden" id="hiddenTitle" name="hiddenTitle">
        <input type="button" value="Submit" onclick="submitForm()">
    </form>
</div>