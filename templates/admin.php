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
    <form id="customSettingsForm">
        <p>Font Color</p>
        <input type="text" value="#bada55" class="my-color-field" data-default-color="#effeff" name="color"/>
        <p>Transform</p>
        <fieldset id="transformGroup">
            <input type="radio" value="none" name="text-transform">None
            <input type="radio" value="uppercase" name="text-transform">UpperCase
            <input type="radio" value="capitalize" name="text-transform">Capitalise
            <input type="radio" value="lowercase" name="text-transform">Lowercase
        </fieldset>
        <p>Alignment</p>
        <fieldset id="alignmentGroup">
            <input type="radio" value="left" name="text-align">Left
            <input type="radio" value="center" name="text-align">Center
            <input type="radio" value="right" name="text-align">Right
            <input type="radio" value="justify" name="text-align">Justify
        </fieldset>
        <p>Font Size</p>
        <div class="slider">
            <input type="range" id="fontSize" min="1" max="50" step="1" name="font-size"><span></span>
        </div>
        <p>Line Height</p>
        <div class="slider">
            <input type="range" id="lineHeight" min="1" max="50" step="1" name="line-height"><span></span>
        </div>
        <p>Letter Spacing</p>
        <div class="slider">
            <input type="range" id="letterSpacing" min="1" max="50" step="1" name="letter-spacing"><span></span>
        </div>
        <p>Background Color</p>
        <input type="text" value="#bada55" class="my-color-field" data-default-color="#effeff" name="background-color"/>
        <p>Border</p>
        <input type="text" value="#bada55" class="my-color-field" data-default-color="#effeff" name="border-color"/>
        <input type="number" min="1" max="10" name="border-width"/>
        <fieldset id="borderGroup">
            <input type="radio" value="solid" name="border-style">Solid
            <input type="radio" value="dashed" name="border-style">Dashed
            <input type="radio" value="dotted" name="border-style">Dotted
        </fieldset>
        <p>Corner Number</p>
        <input type="number" min="1" max="10" name="border-radius"/>
        <br>
        <input type="hidden" id="hiddenTitle" name="hiddenTitle">
        <input type="button" value="Submit" onclick="submitForm()">
    </form>
</div>