@extends('layouts.app')

@section('page-title')
  ATC Roster | {{ Auth::user()->fname }}
@endsection

@section('page-header')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{__('app/atc/rosters.header_title')}}</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
@endsection

@section('page-content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-secondary card-tabs">
        <div class="card-header p-0 pt-1">
          <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
            <li class="nav-item">
              <a
                class="nav-link active" 
                id="atc-roster-tab"
                data-toggle="pill"
                href="#atc-roster"
                role="tab"
                aria-controls="atc-roster"
                aria-selected="true">{{__('app/atc/rosters.roster_tab')}}</a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link" 
                id="atc-mentors-tab"
                data-toggle="pill"
                href="#atc-mentors"
                role="tab"
                aria-controls="atc-mentors"
                aria-selected="false">{{__('app/atc/rosters.mentor_tab')}}</a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link" 
                id="solo-approval-tab"
                data-toggle="pill"
                href="#solo-approval"
                role="tab"
                aria-controls="solo-approval"
                aria-selected="false">{{__('app/atc/rosters.solo_tab')}}</a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link" 
                id="domtom-approval-tab"
                data-toggle="pill"
                href="#domtom-approval"
                role="tab"
                aria-controls="domtom-approval"
                aria-selected="false">{{__('app/atc/rosters.domtom_tab')}}</a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link" 
                id="visiting-approval-tab"
                data-toggle="pill"
                href="#domtom-approval"
                role="tab"
                aria-controls="domtom-approval"
                aria-selected="false">{{__('app/atc/rosters.visiting_tab')}}</a>
            </li>
          </ul>
        </div>
        <div class="card-body">
          <div class="tab-content" id="atc-rosters-tables">
            <div class="tab-pane fade show active" id="atc-roster" role="tabpanel" aria-labelledby="atc-roster-tab">
              <table
                id="atc_roster"
                class="table table-bordered table-hover"
                data-order='[[ 1, "desc" ]]'>
                <thead>
                <tr>
                  <th>{{__('app/atc/rosters.cid')}}</th>
                  <th>{{__('app/atc/rosters.name')}}</th>
                  <th>{{__('app/atc/rosters.rating')}}</th>
                  <th>{{__('app/atc/rosters.approved')}}</th>
                  <th>{{__('app/atc/rosters.authorised')}} LFPG TWR</th>
                  <th>{{__('app/atc/rosters.authorised')}} LFPG APP</th>
                  <th>{{__('app/atc/rosters.authorised')}} LFMN TWR</th>
                  <th>{{__('app/atc/rosters.authorised')}} LFMN APP</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($atc_roster as $atc)
                    <tr>
                      <td>{{ $atc['user']['vatsim_id'] }}</td>
                      @if ($atc['user']['hide_details'] == false)
                      <td>{{ $atc['user']['fname'] }} {{ $atc['user']['lname'] }}</td>
                      @else
                      <td><i>{{__('app/atc/rosters.hidden')}}</i></td>
                      @endif
                      <td>{{ $atc['user']['atc_rating_short'] }}</td>
                      <td>
                        @if ($atc['approved_flag'] == true)
                        {{__('app/atc/rosters.yes')}}
                        @else
                        {{__('app/atc/rosters.no')}}
                        @endif
                      </td>
                      <td>
                        @if ($atc['appr_lfpg_twr'] == true)
                          {{__('app/atc/rosters.yes')}}
                        @else
                          {{__('app/atc/rosters.no')}}
                        @endif
                      </td>
                      <td>
                        @if ($atc['appr_lfpg_app'] == true)
                          {{__('app/atc/rosters.yes')}}
                        @else
                          {{__('app/atc/rosters.no')}}
                        @endif
                      </td>
                      <td>
                        @if ($atc['appr_lfmn_twr'] == true)
                          {{__('app/atc/rosters.yes')}}
                        @else
                          {{__('app/atc/rosters.no')}}
                        @endif
                      </td>
                      <td>
                        @if ($atc['appr_lfmn_app'] == true)
                          {{__('app/atc/rosters.yes')}}
                        @else
                          {{__('app/atc/rosters.no')}}
                        @endif
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="tab-pane fade" id="atc-mentors" role="tabpanel" aria-labelledby="atc-mentors-tab">
              <table
                id="atc_roster"
                class="table table-bordered table-hover"
                data-order='[[ 1, "desc" ]]'>
                <thead>
                <tr>
                  <th>{{__('app/atc/rosters.cid')}}</th>
                  <th>{{__('app/atc/rosters.name')}}</th>
                  <th>{{__('app/atc/rosters.rating')}}</th>
                  <th>{{__('app/atc/rosters.approved_rating')}}</th>
                  <th>{{__('app/atc/rosters.active')}}</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($mentors as $m)
                    <tr>
                      <td>{{ $m['user']['vatsim_id'] }}</td>
                      <td>{{ $m['user']['fname'] }} {{ $m['user']['lname'] }}</td>
                      <td>{{ $m['user']['atc_rating_short'] }}</td>
                      <td>{{ $m['allowed_rank'] }}</td>
                      <td>
                        @if ($m['active'])
                          {{__('app/atc/rosters.yes')}}
                        @else
                          {{__('app/atc/rosters.no')}}
                        @endif
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="tab-pane fade" id="solo-approval" role="tabpanel" aria-labelledby="solo-approval-tab">
              <table
                id="atc_roster"
                class="table table-bordered table-hover"
                data-order='[[ 1, "desc" ]]'>
                <thead>
                <tr>
                  <th>{{__('app/atc/rosters.cid')}}</th>
                  <th>{{__('app/atc/rosters.name')}}</th>
                  <th>{{__('app/atc/rosters.rating')}}</th>
                  <th>{{__('app/atc/rosters.position')}}</th>
                  <th>{{__('app/atc/rosters.mentor')}}</th>
                  <th>{{__('app/atc/rosters.valid')}}</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($soloApproved as $solo)
                  <tr>
                    <td>{{ $solo['user']['vatsim_id'] }}</td>
                    <td>{{ $solo['user']['fname'] }} {{ $solo['user']['lname'] }}</td>
                    <td>{{ $solo['user']['atc_rating_short'] }}</td>
                    <td>{{ $solo['position'] }}</td>
                    <td>{{ $solo['mentor']['user']['fname'] }} {{ $solo['mentor']['user']['lname'] }}</td>
                    <td>
                      @if ($solo['valid'])
                        {{__('app/atc/rosters.yes')}}
                      @else
                        {{__('app/atc/rosters.no')}}
                      @endif
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="tab-pane fade" id="domtom-approval" role="tabpanel" aria-labelledby="domtom-approval-tab">
               Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis. 
            </div>
            <div class="tab-pane fade" id="visiting-approval" role="tabpanel" aria-labelledby="visiting-approval-tab">
              Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis. 
           </div>
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</div>
<script src="{{ asset('dashboard/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('dashboard/jquery/jquery.validate.js') }}"></script>
<script src="{{ asset('dashboard/jquery/additional-methods.js') }}"></script>
<script src="{{ asset('dashboard/adminlte/dist/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('dashboard/adminlte/dist/js/dataTables.bootstrap4.min.js') }}"></script>
<script>
  $('#atc_roster').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": true,
    "ordering": true,
    "autoWidth": true,
    "info": true,
    "scrollY": 300,
  });
</script>
@endsection