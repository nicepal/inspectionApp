@extends('layout')

@section('title', 'Bookings - Inspection Management System')
@section('bookings-active', 'active')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">Bookings</h1>
        <p class="text-muted">Manage inspection bookings and schedules</p>
    </div>
    <div>
        <a href="/inspections/schedule" class="btn btn-primary">
            <i class="bi bi-calendar-plus"></i> New Booking
        </a>
    </div>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card stat-card primary">
            <div class="card-body">
                <h6 class="text-muted mb-2">Today's Bookings</h6>
                <h3 class="mb-0">8</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card success">
            <div class="card-body">
                <h6 class="text-muted mb-2">This Week</h6>
                <h3 class="mb-0">32</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card warning">
            <div class="card-body">
                <h6 class="text-muted mb-2">Pending Confirmation</h6>
                <h3 class="mb-0">12</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card danger">
            <div class="card-body">
                <h6 class="text-muted mb-2">Cancelled This Month</h6>
                <h3 class="mb-0">5</h3>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Calendar View</h5>
                <div class="btn-group btn-group-sm">
                    <button class="btn btn-outline-secondary active">Month</button>
                    <button class="btn btn-outline-secondary">Week</button>
                    <button class="btn btn-outline-secondary">Day</button>
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <button class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-chevron-left"></i> Previous
                    </button>
                    <h5 class="mb-0">October 2025</h5>
                    <button class="btn btn-sm btn-outline-secondary">
                        Next <i class="bi bi-chevron-right"></i>
                    </button>
                </div>
                
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <thead class="table-light">
                            <tr>
                                <th>Sun</th>
                                <th>Mon</th>
                                <th>Tue</th>
                                <th>Wed</th>
                                <th>Thu</th>
                                <th>Fri</th>
                                <th>Sat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-muted">29</td>
                                <td class="text-muted">30</td>
                                <td>1</td>
                                <td>2</td>
                                <td>3</td>
                                <td>4</td>
                                <td>5</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>7</td>
                                <td class="bg-primary bg-opacity-10">
                                    <strong>8</strong><br>
                                    <small class="badge bg-primary">3 bookings</small>
                                </td>
                                <td class="bg-success bg-opacity-10">
                                    <strong>9</strong><br>
                                    <small class="badge bg-success">2 bookings</small>
                                </td>
                                <td class="bg-warning bg-opacity-10">
                                    <strong>10</strong><br>
                                    <small class="badge bg-warning">4 bookings</small>
                                </td>
                                <td>11</td>
                                <td class="bg-info bg-opacity-10">
                                    <strong>12</strong><br>
                                    <small class="badge bg-info">1 booking</small>
                                </td>
                            </tr>
                            <tr>
                                <td>13</td>
                                <td>14</td>
                                <td class="bg-success bg-opacity-10">
                                    <strong>15</strong><br>
                                    <small class="badge bg-success">2 bookings</small>
                                </td>
                                <td>16</td>
                                <td>17</td>
                                <td class="bg-primary bg-opacity-10">
                                    <strong>18</strong><br>
                                    <small class="badge bg-primary">3 bookings</small>
                                </td>
                                <td>19</td>
                            </tr>
                            <tr>
                                <td>20</td>
                                <td>21</td>
                                <td>22</td>
                                <td>23</td>
                                <td>24</td>
                                <td>25</td>
                                <td>26</td>
                            </tr>
                            <tr>
                                <td>27</td>
                                <td>28</td>
                                <td>29</td>
                                <td>30</td>
                                <td>31</td>
                                <td class="text-muted">1</td>
                                <td class="text-muted">2</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-white">
                <h5 class="mb-0">Upcoming Bookings</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Date & Time</th>
                                <th>Property</th>
                                <th>Client</th>
                                <th>Inspector</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    Oct 8, 2025<br>
                                    <small class="text-muted">10:00 AM - 12:00 PM</small>
                                </td>
                                <td>Sunset Plaza Complex</td>
                                <td>ABC Corporation</td>
                                <td>John Smith</td>
                                <td><span class="badge bg-success">Confirmed</span></td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="/inspections/348" class="btn btn-outline-primary">View</a>
                                        <button class="btn btn-outline-info">Reschedule</button>
                                        <button class="btn btn-outline-danger">Cancel</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Oct 9, 2025<br>
                                    <small class="text-muted">2:00 PM - 4:00 PM</small>
                                </td>
                                <td>Green Valley Apartments</td>
                                <td>Property Holdings Inc</td>
                                <td>Sarah Johnson</td>
                                <td><span class="badge bg-success">Confirmed</span></td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="/inspections/347" class="btn btn-outline-primary">View</a>
                                        <button class="btn btn-outline-info">Reschedule</button>
                                        <button class="btn btn-outline-danger">Cancel</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Oct 10, 2025<br>
                                    <small class="text-muted">9:30 AM - 11:30 AM</small>
                                </td>
                                <td>Downtown Office Tower</td>
                                <td>Tech Ventures LLC</td>
                                <td>Michael Brown</td>
                                <td><span class="badge bg-warning">Pending</span></td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="/inspections/345" class="btn btn-outline-primary">View</a>
                                        <button class="btn btn-outline-success">Confirm</button>
                                        <button class="btn btn-outline-danger">Cancel</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Oct 12, 2025<br>
                                    <small class="text-muted">1:00 PM - 3:00 PM</small>
                                </td>
                                <td>Marina Bay Residences</td>
                                <td>Coastal Properties</td>
                                <td>John Smith</td>
                                <td><span class="badge bg-success">Confirmed</span></td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="/inspections/343" class="btn btn-outline-primary">View</a>
                                        <button class="btn btn-outline-info">Reschedule</button>
                                        <button class="btn btn-outline-danger">Cancel</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0">Quick Filters</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Date Range</label>
                    <select class="form-select">
                        <option>Today</option>
                        <option selected>This Week</option>
                        <option>This Month</option>
                        <option>Custom Range</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Inspector</label>
                    <select class="form-select">
                        <option selected>All Inspectors</option>
                        <option>John Smith</option>
                        <option>Sarah Johnson</option>
                        <option>Michael Brown</option>
                        <option>Emily Davis</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select class="form-select">
                        <option selected>All Status</option>
                        <option>Confirmed</option>
                        <option>Pending</option>
                        <option>Cancelled</option>
                        <option>Completed</option>
                    </select>
                </div>
                <button class="btn btn-primary w-100">Apply Filters</button>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0">Inspector Availability</h5>
            </div>
            <div class="card-body">
                <div class="mb-3 pb-3 border-bottom">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <strong>John Smith</strong><br>
                            <small class="text-muted">Fire Safety</small>
                        </div>
                        <span class="badge bg-success">Available</span>
                    </div>
                </div>
                <div class="mb-3 pb-3 border-bottom">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <strong>Sarah Johnson</strong><br>
                            <small class="text-muted">Structural</small>
                        </div>
                        <span class="badge bg-warning">Busy</span>
                    </div>
                </div>
                <div class="mb-3 pb-3 border-bottom">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <strong>Michael Brown</strong><br>
                            <small class="text-muted">Compliance</small>
                        </div>
                        <span class="badge bg-success">Available</span>
                    </div>
                </div>
                <div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <strong>Emily Davis</strong><br>
                            <small class="text-muted">Safety Audit</small>
                        </div>
                        <span class="badge bg-danger">Unavailable</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-white">
                <h5 class="mb-0">Recent Cancellations</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <small class="text-muted">Oct 5, 2025</small><br>
                    <strong>Hillside Manor</strong><br>
                    <small>Cancelled by client</small>
                </div>
                <div class="mb-3">
                    <small class="text-muted">Oct 3, 2025</small><br>
                    <strong>Park Avenue Building</strong><br>
                    <small>Inspector unavailable</small>
                </div>
                <div>
                    <small class="text-muted">Oct 1, 2025</small><br>
                    <strong>Sunset Gardens</strong><br>
                    <small>Rescheduled</small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
