<?php
  $fd = $application->form_data;
  if (is_string($fd)) $fd = json_decode($fd, true);
  if (!is_array($fd)) $fd = [];

  $isRegistration = ($application->application_type === 'registration');

  $labels = [
    // Common / Accreditation (AP3/AP5)
    'title' => 'Title',
    'surname' => 'Surname',
    'first_name' => 'First Name',
    'other_names' => 'Other Names',
    'dob' => 'Date of Birth',
    'birth_place' => 'Place & Country of Birth',
    'marital_status' => 'Marital Status',
    'gender' => 'Sex',
    'sex' => 'Sex',
    'national_reg_no' => 'National ID',
    'id_passport_number' => 'ID/Passport Number',
    'passport_no' => 'Passport Number',
    'nationality' => 'Nationality',
    'origin' => 'Country of Origin',
    'address' => 'Residential Address',
    'zim_address' => 'Zimbabwe Address',
    'zim_local_address' => 'Local Address in Zimbabwe',
    'phone' => 'Phone Number',
    'email' => 'Email Address',
    'employment_type' => 'Employment Type',
    'medium_type' => 'Medium Type',
    'designation' => 'Designation',
    'media_org' => 'Media Organization',
    'employer_name' => 'Employer Name',
    'assignment_brief' => 'Brief on Assignment',
    'arrival_date' => 'Arrival Date',
    'departure_date' => 'Departure Date',
    'port_entry' => 'Port of Entry',
    'collection_region' => 'Collection Office',
    
    // Media House (AP1)
    'org_name' => 'Organization Name',
    'organization_name' => 'Organization Name',
    'reg_no' => 'Registration Number',
    'website' => 'Website',
    'head_office' => 'Head Office Address',
    'organization_address' => 'Physical Address',
    'postal_address' => 'Postal Address',
    'contact_person' => 'Contact Person',
    'contact_name' => 'Contact Person / Name',
    'contact_surname' => 'Contact Surname',
    'contact_email' => 'Contact Email',
    'contact_phone' => 'Contact Phone',
    'contact_address' => 'Contact Physical Address',
    'contact_phone_country_code' => 'Country Code',
    'category' => 'Category',
    'operating_model' => 'Operating Model',
    'mass_media_category' => 'Mass Media Category',
    'mass_media_activity' => 'Mass Media Activity',
    'org_name' => 'Organization Name',
    'organization_name' => 'Organization Name',
    'entity_name' => 'Entity / Service Name',
    'org_head_office' => 'Head Office Address',
    'head_office' => 'Head Office Address',
    'org_mailing_address' => 'Mailing Address',
    'postal_address' => 'Postal Address',
    'rep_office_name' => 'Representative Office Name',
    'rep_office_email' => 'Representative Office Email',
    'rep_office_address' => 'Representative Office Address',
    'rep_office_activities' => 'Representative Office Activities',
    'rep_office_wholly_owned' => 'Wholly Owned by Applicant?',
    'ceo_name' => 'CEO Name',
    'ceo_surname' => 'CEO Surname',
    'ceo_nationality' => 'CEO Nationality',
    'ceo_qualifications' => 'CEO Qualifications',
    'ceo_experience' => 'CEO Experience',
    'previous_reference' => 'Previous Reg. Reference',
    'changes' => 'Any Changes?',
    'changes_details' => 'Details of Changes',
    'declaration_agreed' => 'Declaration Agreed?',
    'declaration_confirmed' => 'Declaration Confirmed?',
    'replacement_reason' => 'Reason for Replacement',
    'return_damaged' => 'Will Return Damaged Certificate?',
    'q_convicted' => 'Has convictions?',
    'q_convicted_details' => 'Conviction Details',
    'q_judgment_debt' => 'Failed judgment debt?',
    'q_judgment_debt_details' => 'Judgment Debt Details',
    'q_insolvent_a' => 'Adjudged insolvent?',
    'q_insolvent_b' => 'Insolvency petition (10yr)?',
    'q_insolvent_c' => 'Compromise with creditors?',
    'q_insolvent_d' => 'Declared insolvent?',
    'q_insolvent_details' => 'Insolvency Details',
    'other_relevant_info' => 'Other Relevant Info',
    'mass_media_activities' => 'Mass Media Activities',
  ];

  // Fields to exclude from the main loop if they are handled separately or metadata
  $exclude = ['current_step', 'registration_scope', 'journalist_scope', 'directors', 'managers', 'senior_managers', 'directors_rows', 'managers_rows', 'ap1'];

  // Flatten ap1 block if it exists (some structures nest it)
  if (isset($fd['ap1']) && is_array($fd['ap1'])) {
      foreach($fd['ap1'] as $k => $v) {
          if (!isset($fd[$k])) $fd[$k] = $v;
      }
  }
?>

<div class="card border-0 shadow-sm mb-4">
  <div class="card-header bg-white fw-bold d-flex justify-content-between align-items-center">
    <span><i class="ri-file-list-3-line me-1"></i> Full Application Data</span>
    <span class="badge bg-light text-dark border"><?php echo e(strtoupper($application->application_type)); ?></span>
  </div>
  <div class="card-body p-0">
    <?php if(session('success')): ?>
      <div class="alert alert-success d-flex align-items-start gap-2 mb-0 rounded-0 border-0 border-bottom">
        <i class="ri-checkbox-circle-line" style="font-size: var(--font-size-lg); line-height: 1;"></i>
        <div><?php echo e(session('success')); ?></div>
      </div>
    <?php endif; ?>
    <div class="table-responsive">
      <table class="table table-sm table-hover mb-0 align-middle">
        <tbody class="small">
          <?php $__currentLoopData = $fd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(in_array($key, $exclude) || empty($value)): ?> <?php continue; ?> <?php endif; ?>
            <tr>
              <td class="bg-light fw-bold text-muted ps-3" style="width: 35%;"><?php echo e($labels[$key] ?? ucwords(str_replace('_', ' ', $key))); ?></td>
              <td class="ps-3">
                <?php if(is_array($value)): ?>
                  <pre class="mb-0 x-small"><?php echo e(json_encode($value, JSON_PRETTY_PRINT)); ?></pre>
                <?php elseif(is_bool($value)): ?>
                  <?php echo e($value ? 'Yes' : 'No'); ?>

                <?php else: ?>
                  <?php echo e($value); ?>

                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>

    
    <?php
      $directors = $fd['directors'] ?? $fd['directors_rows'] ?? null;
      $managers = $fd['managers'] ?? $fd['managers_rows'] ?? $fd['senior_managers'] ?? null;
    ?>

    <?php if($directors && is_array($directors)): ?>
      <div class="p-3 border-top">
        <h6 class="fw-bold small mb-2 text-primary"><i class="ri-team-line me-1"></i> Directors</h6>
        <div class="table-responsive">
          <table class="table table-sm table-bordered mb-0 x-small">
            <thead class="bg-light">
              <tr>
                <th>Name</th>
                <th>Nationality</th>
                <th>Address</th>
                <th>Occupation</th>
                <th>Shares %</th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $directors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e(($d['name'] ?? '') . ' ' . ($d['surname'] ?? $d['director_name'] ?? '')); ?></td>
                  <td><?php echo e($d['nationality'] ?? $d['director_nationality'] ?? '—'); ?></td>
                  <td><?php echo e($d['address'] ?? $d['director_address'] ?? '—'); ?></td>
                  <td><?php echo e($d['occupation'] ?? '—'); ?></td>
                  <td><?php echo e($d['shareholding_percent'] ?? '—'); ?>%</td>
                </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
      </div>
    <?php endif; ?>

    <?php if($managers && is_array($managers)): ?>
      <div class="p-3 border-top">
        <h6 class="fw-bold small mb-2 text-primary"><i class="ri-user-star-line me-1"></i> Managers</h6>
        <div class="table-responsive">
          <table class="table table-sm table-bordered mb-0 x-small">
            <thead class="bg-light">
              <tr>
                <th>Name</th>
                <th>Nationality</th>
                <th>Qualifications</th>
                <th>Occupation/Exp</th>
                <th>Address</th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $managers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e(($m['name'] ?? '') . ' ' . ($m['surname'] ?? $m['manager_name'] ?? '')); ?></td>
                  <td><?php echo e($m['nationality'] ?? $m['manager_nationality'] ?? '—'); ?></td>
                  <td><?php echo e($m['qualifications'] ?? '—'); ?></td>
                  <td><?php echo e($m['occupation'] ?? $m['manager_occupation'] ?? $m['experience'] ?? '—'); ?></td>
                  <td><?php echo e($m['address'] ?? $m['manager_address'] ?? '—'); ?></td>
                </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>

<style>
  .x-small { font-size: var(--font-size-dense); }
  .table-sm td, .table-sm th { padding: 0.5rem 0.5rem; }
</style>
<?php /**PATH /home/runner/workspace/resources/views/staff/partials/application_details_card.blade.php ENDPATH**/ ?>