
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="{{ asset('Admin_front/img/hafizullah.jpg') }}" alt="Profile" class="img-fluid rounded-circle" ></div>
          <div class="title">
            <h1 class="h5">{{ Auth::user()->name }}</h1>
            <p>Admin</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
{{--  <span class="heading">Main</span>  --}}

<ul class="list-unstyled">

    <!-- Dashboard -->
    <li>
        <a href="{{ route('dashboard') }}">
            <i class="fa fa-dashboard"></i> {{ __('messages.dashboard') }}
        </a>
    </li>

    <!-- Doctors -->
    <li>
        <a href="#doctorDropdown" data-toggle="collapse" aria-expanded="false">
            <i class="fa fa-user-md"></i>{{ __('messages.doctors') }}
        </a>

        <ul id="doctorDropdown" class="collapse list-unstyled">
            <li><a href="{{ route('doctors.index') }}">{{ __('messages.All_Doctors') }}</a></li>
            <li><a href="{{ route('doctors.create') }}">{{ __('messages.add_doctor')}}</a></li>
            <li><a href="{{ route('schedule.index') }}">{{ __('messages.Doctor_Schedule') }}</a></li>
        </ul>
    </li>

    <!-- Patients -->
    <li>
        <a href="#patientDropdown" data-toggle="collapse" aria-expanded="false">
            <i class="fa fa-users"></i>{{ __('messages.patients') }}
        </a>

        <ul id="patientDropdown" class="collapse list-unstyled">
            <li><a href="{{ route('patients.index') }}">{{ __('messages.All_Patients') }}</a></li>
            <li><a href="{{ route('patients.create') }}">{{ __('messages.add_patient') }}</a></li>
            <li><a href="{{ route('patient_history.index') }}">{{ __('messages.Patient_History') }}</a></li>
        </ul>
    </li>

    <!-- Appointments -->
    <li>
        <a href="#appointmentDropdown" data-toggle="collapse" aria-expanded="false">
            <i class="fa fa-calendar"></i> {{ __('messages.Appointments') }}
        </a>

        <ul id="appointmentDropdown" class="collapse list-unstyled">
            <li><a href="{{ route('appointments.index') }}">{{ __('messages.All_Appointments') }}</a></li>
            <li><a href="{{ route('appointments.create') }}">{{ __('messages.create_appointment') }}</a></li>
            <li><a href="{{ route('appointment.pending') }}">{{ __('messages.Pending_Appointments') }}</a></li>
        </ul>
    </li>

    <!-- Departments -->
    <li>
        <a href="#departmentDropdown" data-toggle="collapse" aria-expanded="false">
            <i class="fa fa-hospital-o"></i>{{ __('messages.Departments') }}
        </a>

        <ul id="departmentDropdown" class="collapse list-unstyled">
            <li><a href="{{ route('departments.index') }}">{{ __('messages.All_Departments') }}</a></li>
            <li><a href="{{ route('departments.create') }}">{{ __('messages.Add_Department') }}</a></li>
        </ul>
    </li>

    <!-- Medicines -->
    <li>
        <a href="#medicineDropdown" data-toggle="collapse" aria-expanded="false">
            <i class="fa fa-medkit"></i> {{ __('messages.Medicines') }}
        </a>

        <ul id="medicineDropdown" class="collapse list-unstyled">
            <li><a href="{{ route('medicines.index') }}">{{ __('messages.Medicine_List') }}</a></li>
            <li><a href="{{ route('medicines.create') }}">{{ __('messages.Add_Medicine') }}</a></li>
            <li><a href="{{ route('medicine.stock') }}">{{ __('messages.Stock_Management') }}</a></li>
        </ul>
    </li>
    <li>
    <a href="{{ route('latest-news.index') }}">
        <i class="icon-grid"></i>
        {{ __('messages.news') }}
    </a>
</li>

    <!-- Reports -->
    <li>
        <a href="#reportDropdown" data-toggle="collapse" aria-expanded="false">
            <i class="fa fa-file-text"></i>{{ __('messages.Reports') }}
        </a>

        <ul id="reportDropdown" class="collapse list-unstyled">
            <li><a href="{{ route('reports.index') }}">{{ __('messages.ALl_Reports') }}</a></li>
            <li><a href="{{ route('reports.doctors') }}">{{ __('messages.Doctor_Reports') }}</a></li>
            <li><a href="{{ route('reports.patients') }}">{{ __('messages.Patient_Reports') }}</a></li>
             <li><a href="{{ route('reports.appointments') }}">{{ __('messages.Appointment_Reports') }}</a></li>
             <li><a href="{{ route('reports.medicines') }}">{{ __('messages.Medicine_Reports') }}</a></li>
            <li><a href="#">{{ __('messages.Income_Reports') }}</a></li>
        </ul>
    </li>

    <!-- Settings -->
    <li>
        <a href="#settingDropdown" data-toggle="collapse" aria-expanded="false">
            <i class="fa fa-cog"></i> {{ __('messages.Settings') }}
        </a>

        <ul id="settingDropdown" class="collapse list-unstyled">
            <li><a href="{{ route('admin.profile') }}"> {{ __('messages.Profile') }} </a></li>
            <li><a href="{{ route('admin.settings') }}">{{ __('messages.SystemSettings') }}</a></li>
        </ul>
    </li>

</ul>
{{-- Manvabar
                {{--  <li class="active"><a href="index.html"> <i class="icon-home"></i>Home </a></li>
                <li><a href="Admin_front/tables.html"> <i class="icon-grid"></i>Tables </a></li>
                <li><a href="Admin_front/charts.html"> <i class="fa fa-bar-chart"></i>Charts </a></li>
                <li><a href="Admin_front/forms.html"> <i class="icon-padnote"></i>Forms </a></li>  --}}



                {{--  <li><a href="Admin_front/login.html"> <i class="icon-logout"></i>Login page </a></li>  --}}
        {{--  </ul><span class="heading">Extras</span>
        <ul class="list-unstyled">
          <li> <a href="#"> <i class="icon-settings"></i>Demo </a></li>
          <li> <a href="#"> <i class="icon-writing-whiteboard"></i>Demo </a></li>
          <li> <a href="#"> <i class="icon-chart"></i>Demo </a></li>
        </ul>  --}}
      </nav>
      <!-- Sidebar Navigation end-->
