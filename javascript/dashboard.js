// Variables
var addProduct = document.getElementById("add-product");
var confirmAddButton = document.getElementById("confirm-add");
var addButton = document.getElementById("add");
var allProducts = document.getElementById("all-products");
var addButtonDesk = document.getElementById("add-desktop");
var productDetails = document.getElementById("product-details");
var viewButtons = document.getElementById("view-buttons");
var editProduct = document.getElementById("edit-product");
var confirmEditButton = document.getElementById("confirm-edit");
var editConfirm = document.getElementById("edit-confirm");
var overEditButtons = document.getElementById("overlay-edit-buttons");
var deleteConfirm = document.getElementById("delete-confirm");
var overDeleteButtons = document.getElementById("overlay-delete-buttons");

// Add products
function viewAdd() {
    addProduct.style.display = "flex";
    confirmAddButton.style.display = "block";
    addButton.style.display = "none";
    allProducts.style.display = "none";
    addButtonDesk.classList.add("disabled");

    document.getElementById('name').value = '';
    name_print.style.border="none";
    infoIconName.style.fill = "#3a8ec7";

    document.getElementById('brand').value = '';
    brand_print.style.border="none";
    infoIconBrand.style.fill = "#3a8ec7";

    document.getElementById('microprocessor').value = '';
    microprocessor.style.border="none";
    infoIconCpu.style.fill = "#3a8ec7";

    document.getElementById('memory').value = '';
    memory.style.border="none";
    infoIconRam.style.fill = "#3a8ec7";

    document.getElementById('video-card').value = '';
    video_card.style.border="none";
    infoIconGpu.style.fill = "#3a8ec7";

    document.getElementById('drive').value = '';
    drive.style.border="none";
    infoIconHdd.style.fill = "#3a8ec7";

}
function closeAdd() {
    addProduct.style.display = "none";
    confirmAddButton.style.display = "none";
    addButton.style.display = "block";
    allProducts.style.display = "block";
    addButtonDesk.classList.remove("disabled");
}

// Select all current expand buttons
var expandButtons = document.querySelectorAll('.expand');
// EventListener Loop to go through all the current existing expand buttons to show the unique details for each individual product depending on which expand button is pressed
for(i=0 ; i < expandButtons.length ; i++) {
    expandButtons[i].addEventListener('click', viewDetails);
}

// View Product Details
function viewDetails() {
    product=this.parentElement;
    viewHiddenDetails(product);
    productDetails.style.display = "block";
    viewButtons.style.display = "flex";
    addButton.style.display = "none";
    addButtonDesk.disabled = true;
    allProducts.style.display = "none";
    addButtonDesk.classList.add("disabled");
}
// Take hidden data from product and put it into the details popup
function viewHiddenDetails(product) {
    document.querySelector('.details .id').innerHTML=product.children[1].children[0].innerHTML;
    document.querySelector('.details .name').innerHTML=product.children[1].children[1].children[0].innerHTML;
    document.querySelector('.details .brand').innerHTML=product.children[1].children[1].children[1].innerHTML;
    document.querySelector('.details .cpu').innerHTML=product.children[1].children[2].innerHTML;
    document.querySelector('.details .ram').innerHTML=product.children[1].children[3].innerHTML;
    document.querySelector('.details .gpu').innerHTML=product.children[1].children[4].innerHTML;
    document.querySelector('.details .hdd').innerHTML=product.children[1].children[5].innerHTML;

}

function closeDetails() {
    productDetails.style.display = "none";
    viewButtons.style.display = "none";
    addButton.style.display = "block";
    addButtonDesk.disabled = false;
    allProducts.style.display = "block";
    addButtonDesk.classList.remove("disabled");
}
// Edit Product Form
function viewEdit() {
    editHiddenDetails();
    editProduct.style.display = "block";
    viewButtons.style.display = "none";
    confirmEditButton.style.display = "block";
    addButtonDesk.disabled = true;
    addButtonDesk.classList.add("disabled");
    allProducts.style.display = "none";
}
// Take data from details popup and put it into the input fields for the edit form
function editHiddenDetails(){
    document.querySelector('.base-edit .name').innerHTML=document.querySelector('.details .name').innerHTML;
    document.querySelector('.base-edit .brand').innerHTML=document.querySelector('.details .brand').innerHTML;
    document.getElementById('micro-edit').value=document.querySelector('.details .cpu').innerHTML;
    document.getElementById('memory-edit').value=document.querySelector('.details .ram').innerHTML;
    document.getElementById('graphique-edit').value=document.querySelector('.details .gpu').innerHTML;
    document.getElementById('drive-edit').value=document.querySelector('.details .hdd').innerHTML;
}
// Cancel the Edit
function closeEdit() {
    editProduct.style.display = "none";
    confirmEditButton.style.display = "none";
    productDetails.style.display = "block";
    viewButtons.style.display = "flex";
}
// Edit Product Confirm Overlay
function confirmEdit() {
    editConfirm.style.display = "block";
    overEditButtons.style.display = "flex";
}
// Delete Product Confirm Overlay
function confirmDelete() {
    deleteConfirm.style.display = "block";
    overDeleteButtons.style.display = "flex";
}
// Close Edit and Delete Overlay
function closeOverlay() {
    editConfirm.style.display = "none";
    deleteConfirm.style.display = "none";
    overEditButtons.style.display = "none";
    overDeleteButtons.style.display = "none";
}
// Confirm the Edit in the Overlay
function closeEditOverlay() {
    editConfirm.style.display = "none";
    deleteConfirm.style.display = "none";
    overEditButtons.style.display = "none";
    overDeleteButtons.style.display = "none";
    editProduct.style.display = "none";
    confirmEditButton.style.display = "none";
    productDetails.style.display = "none";
    viewButtons.style.display = "none";
    addButton.style.display = "block";
    addButtonDesk.disabled = false;
    addButtonDesk.classList.remove("disabled");
    allProducts.style.display = "block";
}
// Confirm the Delete in the Overlay
function closeDeleteOverlay() {
    editConfirm.style.display = "none";
    deleteConfirm.style.display = "none";
    overEditButtons.style.display = "none";
    overDeleteButtons.style.display = "none";
    productDetails.style.display = "none";
    viewButtons.style.display = "none";
    addButton.style.display = "block";
    addButtonDesk.disabled = false;
    addButtonDesk.classList.remove("disabled");
    allProducts.style.display = "block";
}
/* RegEx Form Validation */
// Initializing the variables for submitting the Add form
var nameSubmitAdd = false, brandSubmitAdd = false, cpuSubmitAdd = false, ramSubmitAdd = false, gpuSubmitAdd = false, hddSubmitAdd = false;
// Initializing the variables for submitting the Edit form
var nameSubmitEdit = true, brandSubmitEdit = true, cpuSubmitEdit = true, ramSubmitEdit = true, gpuSubmitEdit = true, hddSubmitEdit = true;
// Add Product Form
//name add
let name_print = document.querySelector("#name");
name_print.addEventListener('input', () => {
    
    let regexName = /^[\d\w\s]+$/g;

    if (name_print.value === '') {
        name_print.style.border="none";
        nameSubmitAdd = false;
        infoIconName.style.fill = "#3a8ec7";
    } else if (regexName.test(name_print.value)) {
        name_print.style.border="2px solid #57A55D";
        nameSubmitAdd = true;
        infoIconName.style.fill = "#57A55D";
    }
    else if (!regexName.test(name_print.value)) {
        name_print.style.border="2px solid #c73a3a";
        nameSubmitAdd = false;
        infoIconName.style.fill = "#c73a3a";
    }
});
//brand add
let brand_print = document.querySelector("#brand");
brand_print.addEventListener('input', () => {
    
    let regexBrand = /^[\d\w\s()-]+$/g;

    if (brand_print.value === '') {
        brand_print.style.border="none";
        brandSubmitAdd = false;
        infoIconBrand.style.fill = "#3a8ec7";
    } else if (regexBrand.test(brand_print.value)) {
        brand_print.style.border="2px solid #57A55D";
        brandSubmitAdd = true;
        infoIconBrand.style.fill = "#57A55D";  
    }
    else if (!regexBrand.test(brand_print.value)) {
        brand_print.style.border="2px solid #c73a3a";
        brandSubmitAdd = false;
        infoIconBrand.style.fill = "#c73a3a";
}
});
//microprocessor add
let microprocessor = document.querySelector("#microprocessor");
microprocessor.addEventListener('input', () => {
    
    let regexCpu = /^([\d.\dGHz]+\s[\w]+\s[\w]+-[\w]+$)/g;

    if (microprocessor.value === '') {
        microprocessor.style.border="none";
        cpuSubmitAdd = false;
        infoIconCpu.style.fill = "#3a8ec7";
    } else if (regexCpu.test(microprocessor.value)) {
        microprocessor.style.border="2px solid #57A55D";
        cpuSubmitAdd = true;
        infoIconCpu.style.fill = "#57A55D";
    }
    else if (!regexCpu.test(microprocessor.value))  {
        microprocessor.style.border="2px solid #c73a3a";
        cpuSubmitAdd = false;
        infoIconCpu.style.fill = "#c73a3a";
}
});
//memory add
let memory = document.querySelector("#memory");
memory.addEventListener('input', () => {
    
    let regexRam = /^[\d]{1,2}GB$/g;

    if (memory.value === '') {
        memory.style.border="none";
        ramSubmitAdd = false;
        infoIconRam.style.fill = "#3a8ec7";
    } else if (regexRam.test(memory.value)) {
        memory.style.border="2px solid #57A55D";
        ramSubmitAdd = true;
        infoIconRam.style.fill = "#57A55D";
    }
    else if (!regexRam.test(memory.value)) {
        memory.style.border="2px solid #c73a3a";
        ramSubmitAdd = false;
        infoIconRam.style.fill = "#c73a3a";
}
});
//video card add
let video_card = document.querySelector("#video-card");
video_card.addEventListener('input', () => {
    
    let regexGpu = /^[\w]+\s[\w]+\s[\d]{4}$/g;

    if (video_card.value === '') {
        video_card.style.border="none";
        gpuSubmitAdd = false;
        infoIconGpu.style.fill = "#3a8ec7";
    } else if (regexGpu.test(video_card.value)) {
        video_card.style.border="2px solid #57A55D";
        gpuSubmitAdd = true;
        infoIconGpu.style.fill = "#57A55D";
    }
    else if (!regexGpu.test(video_card.value)) {
        video_card.style.border="2px solid #c73a3a";
        gpuSubmitAdd = false;
        infoIconGpu.style.fill = "#c73a3a";
}
});
//drive add
let drive = document.querySelector("#drive");
drive.addEventListener('input', () => {
    
    let regexHdd = /^[\d]{3,4}GB$/g;

    if (drive.value === '') {
        drive.style.border="none";
        hddSubmitAdd = false;
        infoIconHdd.style.fill = "#3a8ec7";
    } else if (regexHdd.test(drive.value)) {
        drive.style.border="2px solid #57A55D";
        hddSubmitAdd = true;
        infoIconHdd.style.fill = "#57A55D";
    }
    else if (!regexHdd.test(drive.value)) {
        drive.style.border="2px solid #c73a3a";
        hddSubmitAdd = false;
        infoIconHdd.style.fill = "#c73a3a";
}
});
// Submit Add Form Only if conditions above are true
var add_form = document.getElementById('add-form');

confirmAddButton.addEventListener('click', function(event) {
    event.preventDefault();
    if (nameSubmitAdd === true && brandSubmitAdd === true && cpuSubmitAdd === true && ramSubmitAdd === true && gpuSubmitAdd === true && hddSubmitAdd === true) {
        add_form.submit();
    }
})

//Edit Product Form
//microprocessor edit
let microprocessor_edit = document.querySelector("#micro-edit");
microprocessor_edit.addEventListener('input', () => {
    
    let regexCpu = /^([\d.\dGHz]+\s[\w]+\s[\w]+-[\w]+$)/g;

    if (microprocessor_edit.value === '') {
        microprocessor_edit.style.border="none";
        cpuSubmitEdit = false;
        infoIconCpuEdit.style.fill = "#3a8ec7";
    } else if (regexCpu.test(microprocessor_edit.value)) {
        microprocessor_edit.style.border="2px solid #57A55D";
        cpuSubmitEdit = true;
        infoIconCpuEdit.style.fill = "#57A55D";
    }
    else if (!regexCpu.test(microprocessor_edit.value)) {
        microprocessor_edit.style.border="2px solid #c73a3a";
        cpuSubmitEdit = false;
        infoIconCpuEdit.style.fill = "#c73a3a";
}
});
//memory edit
let memory_edit = document.querySelector("#memory-edit");
memory_edit.addEventListener('input', () => {
    
    let regexRam = /^[\d]{1,2}GB$/g;

    if (memory_edit.value === '') {
        memory_edit.style.border="none";
        ramSubmitEdit = false;
        infoIconRamEdit.style.fill = "#3a8ec7";
    } else if (regexRam.test(memory_edit.value)) {
        memory_edit.style.border="2px solid #57A55D";
        ramSubmitEdit = true;
        infoIconRamEdit.style.fill = "#57A55D";
    }
    else if (!regexRam.test(memory_edit.value)) {
        memory_edit.style.border="2px solid #c73a3a";
        ramSubmitEdit = false;
        infoIconRamEdit.style.fill = "#c73a3a";
}
});
//video card edit
let video_card_edit = document.querySelector("#graphique-edit");
video_card_edit.addEventListener('input', () => {
    
    let regexGpu = /^[\w]+\s[\w]+\s[\d]{4}$/g;
    
    if (video_card_edit.value === '') {
        video_card_edit.style.border="none";
        gpuSubmitEdit = false;
        infoIconGpuEdit.style.fill = "#3a8ec7";
    } else if (regexGpu.test(video_card_edit.value)) {
        video_card_edit.style.border="2px solid #57A55D";
        gpuSubmitEdit = true;
        infoIconGpuEdit.style.fill = "#57A55D";
    }
    else if (!regexGpu.test(video_card_edit.value)) {
        video_card_edit.style.border="2px solid #c73a3a";
        gpuSubmitEdit = false;
        infoIconGpuEdit.style.fill = "#c73a3a";
}
});
//drive edit
let drive_edit = document.querySelector("#drive-edit");
drive_edit.addEventListener('input', () => {
    
    let regexHdd = /^[\d]{3,4}GB$/g;

    if (drive_edit.value === '') {
        drive_edit.style.border="none";
        hddSubmitEdit = false;
        infoIconHddEdit.style.fill = "#3a8ec7";
    } else if (regexHdd.test(drive_edit.value)) {
        drive_edit.style.border="2px solid #57A55D";
        hddSubmitEdit = true;
        infoIconHddEdit.style.fill = "#57A55D";
    }
    else if (!regexHdd.test(drive_edit.value)) {
        drive_edit.style.border="2px solid #c73a3a";
        hddSubmitEdit = false;
        infoIconHddEdit.style.fill = "#c73a3a";
}
});
// Submit Edit Form only if above conditions are true
var edit_form = document.getElementById('edit-form');
var edit_button = document.getElementById('yes-edit');

edit_button.addEventListener('click', function(event) {
    event.preventDefault();
    if (cpuSubmitEdit === true && ramSubmitEdit === true && gpuSubmitEdit === true && hddSubmitEdit === true ) {
        edit_form.submit();
    }
})

// On mouse hover over info icon show tooltip to fill the Add Product Form
// Name
var infoName = document.getElementById('info-name');
var infoIconName = document.getElementById('info-icon-name');
var tooltipName = document.getElementById('tooltip-name');

infoName.addEventListener('mouseover', showTooltipName);
infoName.addEventListener('mouseout', hideTooltipName);

function showTooltipName() {
    tooltipName.style.visibility = "visible";
    tooltipName.style.opacity = "1";
    infoIconName.style.fill = "#57A55D";
}
function hideTooltipName() {
    tooltipName.style.visibility = "hidden";
    tooltipName.style.opacity = "0";
    infoIconName.style.fill = "#3a8ec7";
}
//Brand
var infoBrand = document.getElementById('info-brand');
var infoIconBrand = document.getElementById('info-icon-brand');
var tooltipBrand = document.getElementById('tooltip-brand');

infoBrand.addEventListener('mouseover', showTooltipBrand);
infoBrand.addEventListener('mouseout', hideTooltipBrand);

function showTooltipBrand() {
    tooltipBrand.style.visibility = "visible";
    tooltipBrand.style.opacity = "1";
    infoIconBrand.style.fill = "#57A55D";
}
function hideTooltipBrand() {
    tooltipBrand.style.visibility = "hidden";
    tooltipBrand.style.opacity = "0";
    infoIconBrand.style.fill = "#3a8ec7";
}
//Cpu
var infoCpu = document.getElementById('info-cpu');
var infoIconCpu = document.getElementById('info-icon-cpu');
var tooltipCpu = document.getElementById('tooltip-cpu');

infoCpu.addEventListener('mouseover', showTooltipCpu);
infoCpu.addEventListener('mouseout', hideTooltipCpu);

function showTooltipCpu() {
    tooltipCpu.style.visibility = "visible";
    tooltipCpu.style.opacity = "1";
    infoIconCpu.style.fill = "#57A55D";
}
function hideTooltipCpu() {
    tooltipCpu.style.visibility = "hidden";
    tooltipCpu.style.opacity = "0";
    infoIconCpu.style.fill = "#3a8ec7";
}
//Ram
var infoRam = document.getElementById('info-ram');
var infoIconRam = document.getElementById('info-icon-ram');
var tooltipRam = document.getElementById('tooltip-ram');

infoRam.addEventListener('mouseover', showTooltipRam);
infoRam.addEventListener('mouseout', hideTooltipRam);

function showTooltipRam() {
    tooltipRam.style.visibility = "visible";
    tooltipRam.style.opacity = "1";
    infoIconRam.style.fill = "#57A55D";
}
function hideTooltipRam() {
    tooltipRam.style.visibility = "hidden";
    tooltipRam.style.opacity = "0";
    infoIconRam.style.fill = "#3a8ec7";
}
//Gpu
var infoGpu = document.getElementById('info-gpu');
var infoIconGpu = document.getElementById('info-icon-gpu');
var tooltipGpu = document.getElementById('tooltip-gpu');

infoGpu.addEventListener('mouseover', showTooltipGpu);
infoGpu.addEventListener('mouseout', hideTooltipGpu);

function showTooltipGpu() {
    tooltipGpu.style.visibility = "visible";
    tooltipGpu.style.opacity = "1";
    infoIconGpu.style.fill = "#57A55D";
}
function hideTooltipGpu() {
    tooltipGpu.style.visibility = "hidden";
    tooltipGpu.style.opacity = "0";
    infoIconGpu.style.fill = "#3a8ec7";
}
//Hdd
var infoHdd = document.getElementById('info-hdd');
var infoIconHdd = document.getElementById('info-icon-hdd');
var tooltipHdd = document.getElementById('tooltip-hdd');

infoHdd.addEventListener('mouseover', showTooltipHdd);
infoHdd.addEventListener('mouseout', hideTooltipHdd);

function showTooltipHdd() {
    tooltipHdd.style.visibility = "visible";
    tooltipHdd.style.opacity = "1";
    infoIconHdd.style.fill = "#57A55D";
}
function hideTooltipHdd() {
    tooltipHdd.style.visibility = "hidden";
    tooltipHdd.style.opacity = "0";
    infoIconHdd.style.fill = "#3a8ec7";
}

// On mouse hover over info icon show tooltip to fill the Edit Product Form
//Cpu
var infoCpuEdit = document.getElementById('info-cpu-edit');
var infoIconCpuEdit = document.getElementById('info-icon-cpu-edit');
var tooltipCpuEdit = document.getElementById('tooltip-cpu-edit');

infoCpuEdit.addEventListener('mouseover', showTooltipCpuEdit);
infoCpuEdit.addEventListener('mouseout', hideTooltipCpuEdit);

function showTooltipCpuEdit() {
    tooltipCpuEdit.style.visibility = "visible";
    tooltipCpuEdit.style.opacity = "1";
    infoIconCpuEdit.style.fill = "#57A55D";
}
function hideTooltipCpuEdit() {
    tooltipCpuEdit.style.visibility = "hidden";
    tooltipCpuEdit.style.opacity = "0";
    infoIconCpuEdit.style.fill = "#3a8ec7";
}
//Ram
var infoRamEdit = document.getElementById('info-ram-edit');
var infoIconRamEdit = document.getElementById('info-icon-ram-edit');
var tooltipRamEdit = document.getElementById('tooltip-ram-edit');

infoRamEdit.addEventListener('mouseover', showTooltipRamEdit);
infoRamEdit.addEventListener('mouseout', hideTooltipRamEdit);

function showTooltipRamEdit() {
    tooltipRamEdit.style.visibility = "visible";
    tooltipRamEdit.style.opacity = "1";
    infoIconRamEdit.style.fill = "#57A55D";
}
function hideTooltipRamEdit() {
    tooltipRamEdit.style.visibility = "hidden";
    tooltipRamEdit.style.opacity = "0";
    infoIconRamEdit.style.fill = "#3a8ec7";
}
//Gpu
var infoGpuEdit = document.getElementById('info-gpu-edit');
var infoIconGpuEdit = document.getElementById('info-icon-gpu-edit');
var tooltipGpuEdit = document.getElementById('tooltip-gpu-edit');

infoGpuEdit.addEventListener('mouseover', showTooltipGpuEdit);
infoGpuEdit.addEventListener('mouseout', hideTooltipGpuEdit);

function showTooltipGpuEdit() {
    tooltipGpuEdit.style.visibility = "visible";
    tooltipGpuEdit.style.opacity = "1";
    infoIconGpuEdit.style.fill = "#57A55D";
}
function hideTooltipGpuEdit() {
    tooltipGpuEdit.style.visibility = "hidden";
    tooltipGpuEdit.style.opacity = "0";
    infoIconGpuEdit.style.fill = "#3a8ec7";
}
//Hdd
var infoHddEdit = document.getElementById('info-hdd-edit');
var infoIconHddEdit = document.getElementById('info-icon-hdd-edit');
var tooltipHddEdit = document.getElementById('tooltip-hdd-edit');

infoHddEdit.addEventListener('mouseover', showTooltipHddEdit);
infoHddEdit.addEventListener('mouseout', hideTooltipHddEdit);

function showTooltipHddEdit() {
    tooltipHddEdit.style.visibility = "visible";
    tooltipHddEdit.style.opacity = "1";
    infoIconHddEdit.style.fill = "#57A55D";
}
function hideTooltipHddEdit() {
    tooltipHddEdit.style.visibility = "hidden";
    tooltipHddEdit.style.opacity = "0";
    infoIconHddEdit.style.fill = "#3a8ec7";
}