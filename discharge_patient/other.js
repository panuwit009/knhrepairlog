function toggleOnlyOneInput(selectedCheckbox, groupPrefix) {
    const checkboxes = document.querySelectorAll(`input[name="${groupPrefix}"]`);

    // Uncheck all other checkboxes except the selected one
    checkboxes.forEach((checkbox) => {
        if (checkbox !== selectedCheckbox) {
            checkbox.checked = false;
        }
    });

    // ฟังก์ชันเดิมที่จัดการ input "อื่นๆ"
    const inputField = document.getElementById(`extra-${groupPrefix}-input`);
    if (selectedCheckbox.id === `other-${groupPrefix}`) {
        inputField.style.display = selectedCheckbox.checked ? 'block' : 'none';
        if (!selectedCheckbox.checked) {
            inputField.value = ''; // เคลียร์ข้อมูลในช่องกรอกหาก "อื่นๆ" ถูกยกเลิก
        }
    } else {
        // ซ่อน input "อื่นๆ" หากเลือกตัวเลือกอื่น ๆ
        document.getElementById(`other-${groupPrefix}`).checked = false;
        inputField.style.display = 'none';
        inputField.value = ''; // เคลียร์ข้อมูล
    }
}



function toggleOtherInput(checkbox, inputFieldId) {
    const inputField = document.getElementById(inputFieldId);
    if (checkbox.checked) {
        inputField.style.display = 'block'; // Show input field
    } else {
        inputField.style.display = 'none'; // Hide input field
        inputField.value = ''; // Clear the field when hidden
    }
}

function handleWoundCheckboxChange(checkbox) {
    const extraInput = document.getElementById('extra-wound-input');
    const dateInput = document.getElementById('cut-wound-input');
    const dateLabel = document.getElementById('date-label');

    // Find all wound checkboxes
    const checkboxes = document.querySelectorAll('input[name="wound_options"]');

    // Uncheck other checkboxes
    checkboxes.forEach((cb) => {
        if (cb !== checkbox) {
            cb.checked = false;
        }
    });

    // Hide all input fields by default
    extraInput.style.display = 'none';
    dateInput.style.display = 'none';
    dateLabel.style.display = 'none';

    // Show the relevant input fields based on the selected checkbox
    if (checkbox.checked) {
        if (checkbox.id === 'other-wound') {
            extraInput.style.display = 'inline';
        } else if (checkbox.id === 'dry-wound') {
            dateInput.style.display = 'inline';
            dateLabel.style.display = 'inline';
        }
    }
}   

function handlePainCheckboxChange(checkbox) {
    const extraInput = document.getElementById('extra-pain-input');
    const dateInput = document.getElementById('location-pain-input');

    // Find all wound checkboxes
    const checkboxes = document.querySelectorAll('input[name="pain"]');

    // Uncheck other checkboxes
    checkboxes.forEach((cb) => {
        if (cb !== checkbox) {
            cb.checked = false;
        }
    });

    // Hide all input fields by default
    extraInput.style.display = 'none';
    dateInput.style.display = 'none';

    // Show the relevant input fields based on the selected checkbox
    if (checkbox.checked) {
        if (checkbox.id === 'other-pain') {
            extraInput.style.display = 'inline';
        } else if (checkbox.id === 'location-pain') {
            dateInput.style.display = 'inline';
            dateLabel.style.display = 'inline';
        }
    }
}   

function handleLochiaCheckboxChange(checkbox) {
    const extraInput = document.getElementById('extra-lochia-input');
    const dateInput = document.getElementById('abnormal-lochia-input');

    // Find all wound checkboxes
    const checkboxes = document.querySelectorAll('input[name="lochia"]');

    // Uncheck other checkboxes
    checkboxes.forEach((cb) => {
        if (cb !== checkbox) {
            cb.checked = false;
        }
    });

    // Hide all input fields by default
    extraInput.style.display = 'none';
    dateInput.style.display = 'none';

    // Show the relevant input fields based on the selected checkbox
    if (checkbox.checked) {
        if (checkbox.id === 'other-lochia') {
            extraInput.style.display = 'inline';
        } else if (checkbox.id === 'abnormal-lochia') {
            dateInput.style.display = 'inline';
            dateLabel.style.display = 'inline';
        }
    }
}  

function handleBreastCheckboxChange(checkbox) {
    const extraInput = document.getElementById('extra-breast-input');
    const dateInput = document.getElementById('abnormal-breast-input');

    // Find all wound checkboxes
    const checkboxes = document.querySelectorAll('input[name="breast"]');

    // Uncheck other checkboxes
    checkboxes.forEach((cb) => {
        if (cb !== checkbox) {
            cb.checked = false;
        }
    });

    // Hide all input fields by default
    extraInput.style.display = 'none';
    dateInput.style.display = 'none';

    // Show the relevant input fields based on the selected checkbox
    if (checkbox.checked) {
        if (checkbox.id === 'other-breast') {
            extraInput.style.display = 'inline';
        } else if (checkbox.id === 'abnormal-breast') {
            dateInput.style.display = 'inline';
            dateLabel.style.display = 'inline';
        }
    }
}   

function handleDischargeCheckboxChange(checkbox) {
    const dischargeInput = document.getElementById('other-discharge-input'); // Field for "อื่นๆ"
    const referInput = document.getElementById('extra-discharge-input'); // Field for "Refer"

    // Uncheck other checkboxes in the same group
    const checkboxes = document.getElementsByName('discharge_type[]');
    checkboxes.forEach(cb => {
        if (cb !== checkbox) {
            cb.checked = false; // Uncheck other checkboxes
        }
    });

    // Hide all input fields initially
    dischargeInput.style.display = 'none'; // Hide "อื่นๆ" field
    referInput.style.display = 'none'; // Hide "Refer" field
    document.getElementById('discharge_type_refer').style.display = 'none'; // Hide label for "Refer"
    document.getElementById('discharge_type_other').style.display = 'none'; // Hide label for "อื่นๆ"

    // Show fields based on the selected checkbox
    if (checkbox.checked) {
        const selectedText = checkbox.nextSibling.textContent.trim();
        if (selectedText === "Refer") {
            referInput.style.display = 'inline'; // Show "Refer" field
            document.getElementById('discharge_type_refer').style.display = 'inline'; // Show label
        } else if (selectedText === "อื่นๆ") {
            dischargeInput.style.display = 'inline'; // Show "อื่นๆ" field
            document.getElementById('discharge_type_other').style.display = 'inline'; // Show label
        }
    }
}

function handleCareCheckboxChange(checkbox) {
    const careFields = document.getElementById('care-fields'); // กลุ่มฟิลด์สำหรับการดูแล

    // ยกเลิกการเลือก checkbox อื่นๆ ในกลุ่มเดียวกัน
    const checkboxes = document.getElementsByName('patient_care');
    checkboxes.forEach(cb => {
        if (cb !== checkbox) {
            cb.checked = false; // ยกเลิกการเลือก
        }
    });

    // แสดงกลุ่มฟิลด์ถ้าเลือก "จำเป็น"
    if (checkbox.checked && checkbox.nextSibling.textContent.trim() === "จำเป็น") {
        careFields.style.display = 'inline';
    } else {
        careFields.style.display = 'none'; // ซ่อนกลุ่มฟิลด์ถ้าไม่เลือก "จำเป็น"
    }
}



function handleActivityCheckboxChange(checkbox, name) {
    // ค้นหา checkbox ทั้งหมดในกลุ่ม
    const checkboxes = document.querySelectorAll('input[name="activity[]"], #refer-checkbox, #appointment-checkbox');
    
    // ยกเลิกการติ้กทุก checkbox ในกลุ่ม
    checkboxes.forEach((cb) => {
        if (cb !== checkbox) {
            cb.checked = false;  // ยกเลิกการติ้ก checkbox อื่น ๆ
        }
    });

    // ซ่อนทุก input fields ก่อน
    document.getElementById('extra-activity-input').style.display = 'none';
    document.getElementById('appointment-fields').style.display = 'none';

    // แสดง input fields ตาม checkbox ที่เลือก
    if (checkbox.id === 'refer-checkbox' && checkbox.checked) {
        document.getElementById('extra-activity-input').style.display = 'inline';  // แสดงฟิลด์กรอกโรงพยาบาล
    }
    
    if (checkbox.id === 'appointment-checkbox' && checkbox.checked) {
        document.getElementById('appointment-fields').style.display = 'block';  // แสดงฟิลด์นัดวันที่
    }
}

function handleCaregiverCheckboxChange(checkbox) {
    const caregiverInput = document.getElementById('extra-caregiver-input'); 
    const caregiverLabel = document.getElementById('caregiver-label');
    const caregiverOptions = document.getElementById('caregiver-options');

    // ยกเลิกการเลือก checkbox อื่นๆ ในกลุ่มเดียวกัน
    const checkboxes = document.getElementsByName('caregiver');
    checkboxes.forEach(cb => {
        if (cb !== checkbox) {
            cb.checked = false; // ยกเลิกการเลือก
        }
    });

    // แสดงหรือซ่อน input field สำหรับ "มี"
    const selectedText = checkbox.nextSibling.textContent.trim();
    if (selectedText === "มี") {
        caregiverInput.style.display = checkbox.checked ? 'inline' : 'none';
        caregiverLabel.style.display = checkbox.checked ? 'inline' : 'none';
        caregiverOptions.style.display = checkbox.checked ? 'block' : 'none'; // แสดง checkbox สำหรับ "พร้อมให้การดูแล" และ "ไม่พร้อมให้การดูแล"
    } else {
        caregiverInput.style.display = 'none'; // ซ่อน input ถ้าไม่ติ้ก "มี"
        caregiverLabel.style.display = 'none';
        caregiverOptions.style.display = 'none'; // ซ่อน checkbox สำหรับ "พร้อมให้การดูแล" และ "ไม่พร้อมให้การดูแล"
    }
}

function toggleExclusiveCheckbox(selectedCheckbox) {
    // ดึง checkbox ทั้งหมดที่เกี่ยวข้อง
    const checkboxes = document.querySelectorAll('input[name="caregiver-options"]');
    const notReadyInput = document.getElementById('not-ready-input'); // ดึง input สำหรับ "ไม่พร้อมให้การดูแล"

    // Loop ยกเลิกการเลือก checkbox อื่นๆ นอกเหนือจากที่ถูกเลือก
    checkboxes.forEach(checkbox => {
        if (checkbox !== selectedCheckbox) {
            checkbox.checked = false;
        }
    });

    // แสดง input หากเลือก "ไม่พร้อมให้การดูแล"
    if (selectedCheckbox.id === 'not-ready-caregiver' && selectedCheckbox.checked) {
        notReadyInput.style.display = 'inline';
    } else {
        notReadyInput.style.display = 'none';
    }
}

function handleIdCardkboxChange(checkbox) {
    // ค้นหา checkbox ทั้งหมด
    const checkboxes = document.querySelectorAll('input[name="idcard[]"]');
    // ค้นหา div สำหรับ input เพิ่มเติม
    const extraInputs = document.getElementById('extraInputs');

    // ตรวจสอบว่ามี checkbox ใดถูกติ๊กอยู่หรือไม่
    let isChecked = false;
    checkboxes.forEach(function(cb) {
        if (cb.checked) {
            isChecked = true;
        }
    });

    // แสดงหรือซ่อน input fields ตามสถานะ checkbox
    if (isChecked) {
        extraInputs.style.display = 'flex'; // แสดง input fields
    } else {
        extraInputs.style.display = 'none'; // ซ่อน input fields
    }
}

// ฟังก์ชันสำหรับจัดการ checkbox
function CarCheckboxChange(selectedCheckbox) {
    // ดึง checkbox ทั้งหมดที่มีคลาส discharge-checkbox
    const checkboxes = document.querySelectorAll('.discharge-checkbox');

    checkboxes.forEach(checkbox => {
        // ถ้า checkbox ไม่ใช่ตัวที่ถูกเลือก ให้ยกเลิกการเลือก
        if (checkbox !== selectedCheckbox) {
            checkbox.checked = false;
        }
    });
}