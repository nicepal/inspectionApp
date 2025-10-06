@extends('layout')

@section('title', 'Form Builder - Inspection Management System')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">Form Builder</h1>
        <p class="text-muted">Create custom inspection forms and checklists</p>
    </div>
    <div>
        <button class="btn btn-outline-secondary me-2">
            <i class="bi bi-eye"></i> Preview
        </button>
        <button class="btn btn-outline-primary me-2">
            <i class="bi bi-download"></i> Save as Template
        </button>
        <button class="btn btn-primary">
            <i class="bi bi-check-circle"></i> Save Form
        </button>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-3">
        <div class="card">
            <div class="card-header bg-white">
                <h6 class="mb-0">Form Elements</h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <h6 class="text-muted small mb-2">Basic Fields</h6>
                    <div class="d-grid gap-2">
                        <button class="btn btn-sm btn-outline-secondary text-start" draggable="true">
                            <i class="bi bi-input-cursor-text"></i> Text Input
                        </button>
                        <button class="btn btn-sm btn-outline-secondary text-start" draggable="true">
                            <i class="bi bi-textarea-t"></i> Text Area
                        </button>
                        <button class="btn btn-sm btn-outline-secondary text-start" draggable="true">
                            <i class="bi bi-ui-radios"></i> Radio Buttons
                        </button>
                        <button class="btn btn-sm btn-outline-secondary text-start" draggable="true">
                            <i class="bi bi-check2-square"></i> Checkbox
                        </button>
                        <button class="btn btn-sm btn-outline-secondary text-start" draggable="true">
                            <i class="bi bi-menu-button-wide"></i> Dropdown
                        </button>
                    </div>
                </div>

                <div class="mb-3">
                    <h6 class="text-muted small mb-2">Special Fields</h6>
                    <div class="d-grid gap-2">
                        <button class="btn btn-sm btn-outline-secondary text-start" draggable="true">
                            <i class="bi bi-calendar3"></i> Date Picker
                        </button>
                        <button class="btn btn-sm btn-outline-secondary text-start" draggable="true">
                            <i class="bi bi-clock"></i> Time Picker
                        </button>
                        <button class="btn btn-sm btn-outline-secondary text-start" draggable="true">
                            <i class="bi bi-image"></i> File Upload
                        </button>
                        <button class="btn btn-sm btn-outline-secondary text-start" draggable="true">
                            <i class="bi bi-camera"></i> Photo Capture
                        </button>
                        <button class="btn btn-sm btn-outline-secondary text-start" draggable="true">
                            <i class="bi bi-pencil-square"></i> Signature
                        </button>
                    </div>
                </div>

                <div class="mb-3">
                    <h6 class="text-muted small mb-2">Layout Elements</h6>
                    <div class="d-grid gap-2">
                        <button class="btn btn-sm btn-outline-secondary text-start" draggable="true">
                            <i class="bi bi-type-h1"></i> Section Header
                        </button>
                        <button class="btn btn-sm btn-outline-secondary text-start" draggable="true">
                            <i class="bi bi-text-paragraph"></i> Description Text
                        </button>
                        <button class="btn btn-sm btn-outline-secondary text-start" draggable="true">
                            <i class="bi bi-hr"></i> Divider
                        </button>
                    </div>
                </div>

                <div>
                    <h6 class="text-muted small mb-2">Inspection Specific</h6>
                    <div class="d-grid gap-2">
                        <button class="btn btn-sm btn-outline-primary text-start" draggable="true">
                            <i class="bi bi-check-circle"></i> Pass/Fail Toggle
                        </button>
                        <button class="btn btn-sm btn-outline-primary text-start" draggable="true">
                            <i class="bi bi-star"></i> Rating Scale
                        </button>
                        <button class="btn btn-sm btn-outline-primary text-start" draggable="true">
                            <i class="bi bi-list-check"></i> Checklist Group
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card">
            <div class="card-header bg-white">
                <h6 class="mb-0">Form Canvas</h6>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <label class="form-label">Form Title</label>
                    <input type="text" class="form-control" value="Fire Safety Inspection Form" placeholder="Enter form title...">
                </div>

                <div class="mb-4">
                    <label class="form-label">Form Description</label>
                    <textarea class="form-control" rows="2" placeholder="Enter form description...">Comprehensive fire safety inspection checklist for commercial properties</textarea>
                </div>

                <div class="border rounded p-3 mb-3 bg-light">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h6 class="mb-0"><i class="bi bi-type-h1 text-primary"></i> Fire Alarm System</h6>
                        <div>
                            <button class="btn btn-sm btn-link text-secondary"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-link text-danger"><i class="bi bi-trash"></i></button>
                        </div>
                    </div>
                </div>

                <div class="border rounded p-3 mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <label class="form-label mb-0"><i class="bi bi-check-circle text-success"></i> Control panel operational</label>
                        <div>
                            <button class="btn btn-sm btn-link text-secondary"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-link text-danger"><i class="bi bi-trash"></i></button>
                        </div>
                    </div>
                    <div class="btn-group" role="group">
                        <input type="radio" class="btn-check" name="field1" id="field1-pass">
                        <label class="btn btn-outline-success btn-sm" for="field1-pass">Pass</label>
                        
                        <input type="radio" class="btn-check" name="field1" id="field1-fail">
                        <label class="btn btn-outline-danger btn-sm" for="field1-fail">Fail</label>
                        
                        <input type="radio" class="btn-check" name="field1" id="field1-na">
                        <label class="btn btn-outline-secondary btn-sm" for="field1-na">N/A</label>
                    </div>
                </div>

                <div class="border rounded p-3 mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <label class="form-label mb-0"><i class="bi bi-check-circle text-success"></i> Smoke detectors functional</label>
                        <div>
                            <button class="btn btn-sm btn-link text-secondary"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-link text-danger"><i class="bi bi-trash"></i></button>
                        </div>
                    </div>
                    <div class="btn-group" role="group">
                        <input type="radio" class="btn-check" name="field2" id="field2-pass">
                        <label class="btn btn-outline-success btn-sm" for="field2-pass">Pass</label>
                        
                        <input type="radio" class="btn-check" name="field2" id="field2-fail">
                        <label class="btn btn-outline-danger btn-sm" for="field2-fail">Fail</label>
                        
                        <input type="radio" class="btn-check" name="field2" id="field2-na">
                        <label class="btn btn-outline-secondary btn-sm" for="field2-na">N/A</label>
                    </div>
                </div>

                <div class="border rounded p-3 mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <label class="form-label mb-0"><i class="bi bi-textarea-t text-info"></i> Additional Notes</label>
                        <div>
                            <button class="btn btn-sm btn-link text-secondary"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-link text-danger"><i class="bi bi-trash"></i></button>
                        </div>
                    </div>
                    <textarea class="form-control" rows="3" placeholder="Enter notes..."></textarea>
                </div>

                <div class="border rounded p-3 mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <label class="form-label mb-0"><i class="bi bi-camera text-warning"></i> Upload Photos</label>
                        <div>
                            <button class="btn btn-sm btn-link text-secondary"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-link text-danger"><i class="bi bi-trash"></i></button>
                        </div>
                    </div>
                    <input type="file" class="form-control" multiple accept="image/*">
                </div>

                <div class="border border-dashed rounded p-4 text-center bg-light">
                    <i class="bi bi-plus-circle fs-3 text-muted"></i>
                    <p class="text-muted mb-0">Drag and drop form elements here or click to add</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="card mb-4">
            <div class="card-header bg-white">
                <h6 class="mb-0">Form Settings</h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label small">Form Category</label>
                    <select class="form-select form-select-sm">
                        <option>Fire Safety</option>
                        <option>Structural</option>
                        <option>Compliance</option>
                        <option>Safety Audit</option>
                        <option>Electrical</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label small">Required Fields</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="requireAll" checked>
                        <label class="form-check-label small" for="requireAll">
                            Make all fields required
                        </label>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label small">Enable Features</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="enablePhoto" checked>
                        <label class="form-check-label small" for="enablePhoto">
                            Photo capture
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="enableSignature" checked>
                        <label class="form-check-label small" for="enableSignature">
                            Digital signature
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="enableGPS">
                        <label class="form-check-label small" for="enableGPS">
                            GPS location tracking
                        </label>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label small">Auto-save</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="autoSave" checked>
                        <label class="form-check-label small" for="autoSave">
                            Enable auto-save
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-white">
                <h6 class="mb-0">Recent Forms</h6>
            </div>
            <div class="card-body">
                <div class="mb-3 pb-3 border-bottom">
                    <small><strong>Structural Assessment</strong></small><br>
                    <small class="text-muted">Modified 2 days ago</small>
                </div>
                <div class="mb-3 pb-3 border-bottom">
                    <small><strong>Compliance Checklist</strong></small><br>
                    <small class="text-muted">Modified 5 days ago</small>
                </div>
                <div>
                    <small><strong>Safety Audit Form</strong></small><br>
                    <small class="text-muted">Modified 1 week ago</small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    [draggable="true"] {
        cursor: move;
    }
    
    .border-dashed {
        border-style: dashed !important;
    }
</style>
@endsection
