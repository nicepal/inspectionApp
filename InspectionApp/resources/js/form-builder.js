// Form Builder Application
class FormBuilder {
    constructor() {
        this.fields = [];
        this.fieldIdCounter = 1;
        this.currentEditingField = null;
        this.init();
    }

    init() {
        this.setupDragAndDrop();
        this.setupEventListeners();
        this.loadExampleFields();
    }

    loadExampleFields() {
        // Load the example fields that are already in the canvas
        const existingFields = document.querySelectorAll('.form-field-item');
        existingFields.forEach((field, index) => {
            this.fields.push({
                id: `field-${this.fieldIdCounter++}`,
                type: field.dataset.fieldType || 'header',
                label: field.querySelector('.field-label')?.textContent || 'Field',
                required: false,
                options: []
            });
        });
    }

    setupDragAndDrop() {
        const dragButtons = document.querySelectorAll('[draggable="true"]');
        const dropZone = document.getElementById('formCanvas');

        dragButtons.forEach(button => {
            button.addEventListener('dragstart', (e) => {
                e.dataTransfer.setData('fieldType', button.dataset.fieldType);
                e.dataTransfer.setData('fieldLabel', button.dataset.fieldLabel);
                e.dataTransfer.setData('fieldIcon', button.dataset.fieldIcon);
            });
        });

        if (dropZone) {
            dropZone.addEventListener('dragover', (e) => {
                e.preventDefault();
                dropZone.classList.add('drag-over');
            });

            dropZone.addEventListener('dragleave', () => {
                dropZone.classList.remove('drag-over');
            });

            dropZone.addEventListener('drop', (e) => {
                e.preventDefault();
                dropZone.classList.remove('drag-over');
                
                const fieldType = e.dataTransfer.getData('fieldType');
                const fieldLabel = e.dataTransfer.getData('fieldLabel');
                const fieldIcon = e.dataTransfer.getData('fieldIcon');
                
                this.addField(fieldType, fieldLabel, fieldIcon);
            });
        }
    }

    setupEventListeners() {
        // Preview button
        const previewBtn = document.getElementById('previewBtn');
        if (previewBtn) {
            previewBtn.addEventListener('click', () => this.showPreview());
        }

        // Save form button
        const saveFormBtn = document.getElementById('saveFormBtn');
        if (saveFormBtn) {
            saveFormBtn.addEventListener('click', () => this.saveForm());
        }

        // Save as template button
        const saveTemplateBtn = document.getElementById('saveTemplateBtn');
        if (saveTemplateBtn) {
            saveTemplateBtn.addEventListener('click', () => this.saveAsTemplate());
        }

        // Close edit modal
        const closeEditModal = document.getElementById('closeEditModal');
        if (closeEditModal) {
            closeEditModal.addEventListener('click', () => this.closeEditModal());
        }

        // Save field edits
        const saveFieldBtn = document.getElementById('saveFieldBtn');
        if (saveFieldBtn) {
            saveFieldBtn.addEventListener('click', () => this.saveFieldEdits());
        }
    }

    addField(type, label, icon) {
        const fieldId = `field-${this.fieldIdCounter++}`;
        const field = {
            id: fieldId,
            type: type,
            label: label,
            required: false,
            placeholder: '',
            options: [],
            icon: icon
        };

        this.fields.push(field);
        this.renderField(field);
    }

    renderField(field) {
        const canvas = document.getElementById('formCanvas');
        const dropZone = canvas.querySelector('.border-dashed');
        
        const fieldHtml = this.generateFieldHtml(field);
        
        // Insert before the drop zone
        dropZone.insertAdjacentHTML('beforebegin', fieldHtml);
        
        // Attach event listeners to the new field
        const fieldElement = document.getElementById(field.id);
        this.attachFieldListeners(fieldElement, field.id);
    }

    generateFieldHtml(field) {
        let fieldContent = '';

        switch(field.type) {
            case 'header':
                fieldContent = `
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h6 class="mb-0 field-label"><i class="bi ${field.icon} text-primary"></i> ${field.label}</h6>
                        <div>
                            <button class="btn btn-sm btn-link text-secondary edit-field-btn"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-link text-danger delete-field-btn"><i class="bi bi-trash"></i></button>
                        </div>
                    </div>
                `;
                break;

            case 'text':
                fieldContent = `
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <label class="form-label mb-0 field-label"><i class="bi ${field.icon} text-info"></i> ${field.label}</label>
                        <div>
                            <button class="btn btn-sm btn-link text-secondary edit-field-btn"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-link text-danger delete-field-btn"><i class="bi bi-trash"></i></button>
                        </div>
                    </div>
                    <input type="text" class="form-control" placeholder="${field.placeholder || 'Enter text...'}">
                `;
                break;

            case 'textarea':
                fieldContent = `
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <label class="form-label mb-0 field-label"><i class="bi ${field.icon} text-info"></i> ${field.label}</label>
                        <div>
                            <button class="btn btn-sm btn-link text-secondary edit-field-btn"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-link text-danger delete-field-btn"><i class="bi bi-trash"></i></button>
                        </div>
                    </div>
                    <textarea class="form-control" rows="3" placeholder="${field.placeholder || 'Enter notes...'}"></textarea>
                `;
                break;

            case 'passfail':
                fieldContent = `
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <label class="form-label mb-0 field-label"><i class="bi ${field.icon} text-success"></i> ${field.label}</label>
                        <div>
                            <button class="btn btn-sm btn-link text-secondary edit-field-btn"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-link text-danger delete-field-btn"><i class="bi bi-trash"></i></button>
                        </div>
                    </div>
                    <div class="btn-group" role="group">
                        <input type="radio" class="btn-check" name="${field.id}" id="${field.id}-pass">
                        <label class="btn btn-outline-success btn-sm" for="${field.id}-pass">Pass</label>
                        
                        <input type="radio" class="btn-check" name="${field.id}" id="${field.id}-fail">
                        <label class="btn btn-outline-danger btn-sm" for="${field.id}-fail">Fail</label>
                        
                        <input type="radio" class="btn-check" name="${field.id}" id="${field.id}-na">
                        <label class="btn btn-outline-secondary btn-sm" for="${field.id}-na">N/A</label>
                    </div>
                `;
                break;

            case 'file':
                fieldContent = `
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <label class="form-label mb-0 field-label"><i class="bi ${field.icon} text-warning"></i> ${field.label}</label>
                        <div>
                            <button class="btn btn-sm btn-link text-secondary edit-field-btn"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-link text-danger delete-field-btn"><i class="bi bi-trash"></i></button>
                        </div>
                    </div>
                    <input type="file" class="form-control" multiple accept="image/*">
                `;
                break;

            case 'date':
                fieldContent = `
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <label class="form-label mb-0 field-label"><i class="bi ${field.icon} text-primary"></i> ${field.label}</label>
                        <div>
                            <button class="btn btn-sm btn-link text-secondary edit-field-btn"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-link text-danger delete-field-btn"><i class="bi bi-trash"></i></button>
                        </div>
                    </div>
                    <input type="date" class="form-control">
                `;
                break;

            case 'checkbox':
                fieldContent = `
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="${field.id}-check">
                            <label class="form-check-label field-label" for="${field.id}-check">
                                <i class="bi ${field.icon}"></i> ${field.label}
                            </label>
                        </div>
                        <div>
                            <button class="btn btn-sm btn-link text-secondary edit-field-btn"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-link text-danger delete-field-btn"><i class="bi bi-trash"></i></button>
                        </div>
                    </div>
                `;
                break;

            case 'dropdown':
                const options = field.options.length > 0 ? field.options : ['Option 1', 'Option 2', 'Option 3'];
                fieldContent = `
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <label class="form-label mb-0 field-label"><i class="bi ${field.icon}"></i> ${field.label}</label>
                        <div>
                            <button class="btn btn-sm btn-link text-secondary edit-field-btn"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-link text-danger delete-field-btn"><i class="bi bi-trash"></i></button>
                        </div>
                    </div>
                    <select class="form-select">
                        <option selected>Choose...</option>
                        ${options.map(opt => `<option>${opt}</option>`).join('')}
                    </select>
                `;
                break;

            default:
                fieldContent = `
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <label class="form-label mb-0 field-label"><i class="bi ${field.icon}"></i> ${field.label}</label>
                        <div>
                            <button class="btn btn-sm btn-link text-secondary edit-field-btn"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-link text-danger delete-field-btn"><i class="bi bi-trash"></i></button>
                        </div>
                    </div>
                    <input type="text" class="form-control" placeholder="Enter value...">
                `;
        }

        return `
            <div class="border rounded p-3 mb-3 form-field-item" id="${field.id}" data-field-type="${field.type}">
                ${fieldContent}
            </div>
        `;
    }

    attachFieldListeners(fieldElement, fieldId) {
        // Edit button
        const editBtn = fieldElement.querySelector('.edit-field-btn');
        if (editBtn) {
            editBtn.addEventListener('click', () => this.editField(fieldId));
        }

        // Delete button
        const deleteBtn = fieldElement.querySelector('.delete-field-btn');
        if (deleteBtn) {
            deleteBtn.addEventListener('click', () => this.deleteField(fieldId));
        }
    }

    editField(fieldId) {
        const field = this.fields.find(f => f.id === fieldId);
        if (!field) return;

        this.currentEditingField = fieldId;

        // Populate edit modal
        document.getElementById('editFieldLabel').value = field.label;
        document.getElementById('editFieldPlaceholder').value = field.placeholder || '';
        document.getElementById('editFieldRequired').checked = field.required;

        // Show modal
        const modal = new bootstrap.Modal(document.getElementById('editFieldModal'));
        modal.show();
    }

    saveFieldEdits() {
        if (!this.currentEditingField) return;

        const field = this.fields.find(f => f.id === this.currentEditingField);
        if (!field) return;

        field.label = document.getElementById('editFieldLabel').value;
        field.placeholder = document.getElementById('editFieldPlaceholder').value;
        field.required = document.getElementById('editFieldRequired').checked;

        // Re-render the field
        const fieldElement = document.getElementById(field.id);
        const newFieldHtml = this.generateFieldHtml(field);
        fieldElement.outerHTML = newFieldHtml;
        
        // Re-attach listeners
        const newFieldElement = document.getElementById(field.id);
        this.attachFieldListeners(newFieldElement, field.id);

        // Close modal
        this.closeEditModal();
    }

    closeEditModal() {
        const modal = bootstrap.Modal.getInstance(document.getElementById('editFieldModal'));
        if (modal) modal.hide();
        this.currentEditingField = null;
    }

    deleteField(fieldId) {
        if (confirm('Are you sure you want to delete this field?')) {
            // Remove from fields array
            this.fields = this.fields.filter(f => f.id !== fieldId);
            
            // Remove from DOM
            const fieldElement = document.getElementById(fieldId);
            if (fieldElement) {
                fieldElement.remove();
            }
        }
    }

    showPreview() {
        const formTitle = document.getElementById('formTitle').value;
        const formDescription = document.getElementById('formDescription').value;

        let previewHtml = `
            <div class="modal fade" id="previewModal" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">${formTitle}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <p class="text-muted">${formDescription}</p>
                            <form>
        `;

        this.fields.forEach(field => {
            previewHtml += this.generatePreviewFieldHtml(field);
        });

        previewHtml += `
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Submit Form</button>
                        </div>
                    </div>
                </div>
            </div>
        `;

        // Remove existing preview modal if any
        const existingModal = document.getElementById('previewModal');
        if (existingModal) existingModal.remove();

        // Add new preview modal
        document.body.insertAdjacentHTML('beforeend', previewHtml);

        // Show modal
        const modal = new bootstrap.Modal(document.getElementById('previewModal'));
        modal.show();
    }

    generatePreviewFieldHtml(field) {
        let html = '<div class="mb-3">';

        switch(field.type) {
            case 'header':
                html += `<h5>${field.label}</h5>`;
                break;

            case 'text':
                html += `
                    <label class="form-label">${field.label}${field.required ? ' *' : ''}</label>
                    <input type="text" class="form-control" placeholder="${field.placeholder || ''}">
                `;
                break;

            case 'textarea':
                html += `
                    <label class="form-label">${field.label}${field.required ? ' *' : ''}</label>
                    <textarea class="form-control" rows="3" placeholder="${field.placeholder || ''}"></textarea>
                `;
                break;

            case 'passfail':
                html += `
                    <label class="form-label">${field.label}${field.required ? ' *' : ''}</label>
                    <div class="btn-group w-100" role="group">
                        <input type="radio" class="btn-check" name="${field.id}-preview" id="${field.id}-preview-pass">
                        <label class="btn btn-outline-success" for="${field.id}-preview-pass">Pass</label>
                        
                        <input type="radio" class="btn-check" name="${field.id}-preview" id="${field.id}-preview-fail">
                        <label class="btn btn-outline-danger" for="${field.id}-preview-fail">Fail</label>
                        
                        <input type="radio" class="btn-check" name="${field.id}-preview" id="${field.id}-preview-na">
                        <label class="btn btn-outline-secondary" for="${field.id}-preview-na">N/A</label>
                    </div>
                `;
                break;

            case 'file':
                html += `
                    <label class="form-label">${field.label}${field.required ? ' *' : ''}</label>
                    <input type="file" class="form-control" multiple accept="image/*">
                `;
                break;

            case 'date':
                html += `
                    <label class="form-label">${field.label}${field.required ? ' *' : ''}</label>
                    <input type="date" class="form-control">
                `;
                break;

            case 'checkbox':
                html += `
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="${field.id}-preview">
                        <label class="form-check-label" for="${field.id}-preview">
                            ${field.label}
                        </label>
                    </div>
                `;
                break;

            case 'dropdown':
                const options = field.options.length > 0 ? field.options : ['Option 1', 'Option 2', 'Option 3'];
                html += `
                    <label class="form-label">${field.label}${field.required ? ' *' : ''}</label>
                    <select class="form-select">
                        <option selected>Choose...</option>
                        ${options.map(opt => `<option>${opt}</option>`).join('')}
                    </select>
                `;
                break;
        }

        html += '</div>';
        return html;
    }

    saveForm() {
        const formData = {
            title: document.getElementById('formTitle').value,
            description: document.getElementById('formDescription').value,
            category: document.getElementById('formCategory').value,
            requireAll: document.getElementById('requireAll').checked,
            enablePhoto: document.getElementById('enablePhoto').checked,
            enableSignature: document.getElementById('enableSignature').checked,
            enableGPS: document.getElementById('enableGPS').checked,
            autoSave: document.getElementById('autoSave').checked,
            fields: this.fields
        };

        console.log('Saving form:', formData);
        
        // Show success message
        this.showNotification('Form saved successfully!', 'success');
    }

    saveAsTemplate() {
        const formData = {
            title: document.getElementById('formTitle').value,
            description: document.getElementById('formDescription').value,
            category: document.getElementById('formCategory').value,
            fields: this.fields
        };

        console.log('Saving as template:', formData);
        
        // Show success message
        this.showNotification('Template saved successfully!', 'success');
    }

    showNotification(message, type = 'success') {
        const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
        const alertHtml = `
            <div class="alert ${alertClass} alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-3" role="alert" style="z-index: 9999;">
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        `;
        
        document.body.insertAdjacentHTML('beforeend', alertHtml);
        
        // Auto-dismiss after 3 seconds
        setTimeout(() => {
            const alert = document.querySelector('.alert');
            if (alert) {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            }
        }, 3000);
    }
}

// Initialize form builder when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    if (document.getElementById('formCanvas')) {
        window.formBuilder = new FormBuilder();
    }
});
