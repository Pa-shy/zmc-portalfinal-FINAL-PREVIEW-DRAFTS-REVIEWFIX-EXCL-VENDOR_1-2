<script>
  let ap1Step = 1;
  const csrfToken = '{{ csrf_token() }}';

  const ap1SelectedDocs = {};
  const ap1ObjectUrls = [];

  function escapeHtml(str) {
    return String(str ?? '')
      .replaceAll('&', '&amp;')
      .replaceAll('<', '&lt;')
      .replaceAll('>', '&gt;')
      .replaceAll('"', '&quot;')
      .replaceAll("'", '&#039;');
  }

  // ===== Step UI =====
  function ap1UpdateSteps() {
    const steps = document.querySelectorAll('#new-registration-page .step');
    const contents = document.querySelectorAll('#new-registration-page .step-content');

    steps.forEach(s => {
      const n = parseInt(s.dataset.step, 10);
      s.classList.remove('active','completed');
      const num = s.querySelector('.step-number');

      if (n < ap1Step) {
        s.classList.add('completed');
        if (num) num.innerHTML = '<i class="ri-check-line"></i>';
      } else {
        if (num) num.textContent = String(n);
      }

      if (n === ap1Step) s.classList.add('active');
    });

    contents.forEach(c => c.classList.remove('active'));
    document.getElementById('ap1-step-' + ap1Step)?.classList.add('active');

    const prev = document.getElementById('ap1PrevBtn');
    const next = document.getElementById('ap1NextBtn');

    if (prev) prev.style.display = (ap1Step === 1) ? 'none' : 'inline-block';
    if (next) next.innerHTML = (ap1Step === 7)
      ? 'Review & Submit <i class="ri-file-search-line"></i>'
      : 'Next <i class="ri-arrow-right-line"></i>';
  }

  function ap1ValidateStep() {
    const active = document.getElementById('ap1-step-' + ap1Step);
    if (!active) return true;

    // Step 1 must have scope
    if (ap1Step === 1) {
      const scope = document.getElementById('ap1_registration_scope')?.value;
      if (!scope) { alert('Please choose the Registration Type (Local or Foreign).'); return false; }
    }

    // validate required fields inside visible step
    const required = active.querySelectorAll('[required]');
    for (const el of required) {
      if (el.type === 'file') continue;
      if (el.type === 'checkbox' && !el.checked) { alert('Please agree to the declaration.'); el.focus(); return false; }
      if (!String(el.value || '').trim()) { alert('Please fill in all required fields.'); el.focus(); return false; }
    }

    // files required on Step 6
    if (ap1Step === 6) {
      const scope = document.getElementById('ap1_registration_scope')?.value;
      const files = active.querySelectorAll('input[type="file"][required]');
      for (const f of files) {
        if (!f.files || !f.files[0]) { alert('Please upload all required annexures.'); return false; }
      }
      
      // Journalist list is required for Foreign Media
      if (scope === 'foreign') {
        const jList = document.querySelector('input[name="documents[journalist_list]"]');
        if (jList && (!jList.files || !jList.files[0])) {
          alert('Foreign Media Houses must upload the list of journalists.');
          return false;
        }
      }
    }

    return true;
  }

  // ===== Dynamic Activity (Radio + Other) =====
  function applyActivityVisibility() {
    const activity = document.getElementById('mass_media_activity')?.value;

    const radioWrap = document.getElementById('radioFields');
    const otherWrap = document.getElementById('otherActivityField');

    const radioRequiredIds = [
      'radio_titles_published','radio_frequency','radio_circulation_figures','radio_general_news','radio_specialized_info'
    ];

    if (radioWrap) radioWrap.style.display = (activity === 'Radio') ? '' : 'none';
    if (otherWrap) otherWrap.style.display = (activity === 'Other') ? '' : 'none';

    // Required toggles for radio
    radioRequiredIds.forEach(id => {
      const el = document.getElementById(id);
      if (!el) return;
      if (activity === 'Radio') el.setAttribute('required','required');
      else el.removeAttribute('required');
    });

    // Required toggle for other
    const otherEl = document.getElementById('mass_media_activity_other');
    if (otherEl) {
      if (activity === 'Other') otherEl.setAttribute('required','required');
      else otherEl.removeAttribute('required');
    }
  }

  // ===== Foreign Media Scope Toggles =====
  function applyScopeVisibility() {
    const scope = document.getElementById('ap1_registration_scope')?.value;
    const localOnly = document.querySelectorAll('.registration-local-only');
    const foreignOnly = document.querySelectorAll('.registration-foreign-only');

    if (scope === 'foreign') {
      localOnly.forEach(el => el.style.display = 'none');
      foreignOnly.forEach(el => el.style.display = 'block');
      
      // Update required attributes
      document.getElementById('mass_media_activity')?.removeAttribute('required');
      document.getElementById('org_name')?.setAttribute('required', 'required');
      document.getElementById('org_head_office')?.setAttribute('required', 'required');
      document.getElementById('org_mailing_address')?.setAttribute('required', 'required');
      document.getElementById('rep_office_name')?.setAttribute('required', 'required');
      document.getElementById('rep_office_email')?.setAttribute('required', 'required');
      document.getElementById('rep_office_address')?.setAttribute('required', 'required');
      document.getElementById('rep_office_activities')?.setAttribute('required', 'required');
      
      // Radio for foreign media type
      document.querySelectorAll('input[name="foreign_media_type"]').forEach(r => r.setAttribute('required', 'required'));
      document.querySelectorAll('input[name="rep_office_wholly_owned"]').forEach(r => r.setAttribute('required', 'required'));

    } else {
      localOnly.forEach(el => el.style.display = 'block');
      foreignOnly.forEach(el => el.style.display = 'none');

      // Update required attributes
      document.getElementById('mass_media_activity')?.setAttribute('required', 'required');
      document.getElementById('org_name')?.removeAttribute('required');
      document.getElementById('org_head_office')?.removeAttribute('required');
      document.getElementById('org_mailing_address')?.removeAttribute('required');
      document.getElementById('rep_office_name')?.removeAttribute('required');
      document.getElementById('rep_office_email')?.removeAttribute('required');
      document.getElementById('rep_office_address')?.removeAttribute('required');
      document.getElementById('rep_office_activities')?.removeAttribute('required');

      document.querySelectorAll('input[name="foreign_media_type"]').forEach(r => r.removeAttribute('required'));
      document.querySelectorAll('input[name="rep_office_wholly_owned"]').forEach(r => r.removeAttribute('required'));
    }
  }

  function applyWhollyOwnedVisibility() {
    const val = document.querySelector('input[name="rep_office_wholly_owned"]:checked')?.value;
    const section = document.getElementById('repOfficeShareholdersSection');
    if (section) section.style.display = (val === 'no') ? 'block' : 'none';
    
    // Manage required for repeater if visible
    const inputs = section?.querySelectorAll('input');
    inputs?.forEach(input => {
        if (val === 'no') input.setAttribute('required', 'required');
        else input.removeAttribute('required');
    });
  }

  // ===== Repeaters =====
  let directorIdx = 0;
  function directorRowHtml(i) {
    return `
      <tr data-row="${i}">
        <td><input class="form-control" name="directors[name][]" required></td>
        <td><input class="form-control" name="directors[surname][]" required></td>
        <td><input class="form-control" name="directors[address][]" required></td>
        <td><input class="form-control" name="directors[occupation][]" required></td>
        <td><input class="form-control" name="directors[nationality][]" required></td>
        <td><input class="form-control" type="number" name="directors[shareholding_percent][]" min="0" max="100" step="0.01" required></td>

        <td>
          <select class="form-control director-toggle" data-target="directorships_${i}" name="directors[other_directorships][]" required>
            <option value="">Select</option>
            <option value="no">No</option>
            <option value="yes">Yes</option>
          </select>
        </td>
        <td>
          <input class="form-control director-dependent" id="directorships_${i}" name="directors[companies_concerned][]" placeholder="If yes, specify">
        </td>

        <td>
          <select class="form-control director-toggle" data-target="publicoffice_${i}" name="directors[public_political_office][]" required>
            <option value="">Select</option>
            <option value="no">No</option>
            <option value="yes">Yes</option>
          </select>
        </td>
        <td>
          <input class="form-control director-dependent" id="publicoffice_${i}" name="directors[public_political_details][]" placeholder="If yes, provide details">
        </td>

        <td>
          <select class="form-control director-toggle" data-target="othershare_${i}" name="directors[other_shareholdings][]" required>
            <option value="">Select</option>
            <option value="no">No</option>
            <option value="yes">Yes</option>
          </select>
        </td>
        <td>
          <input class="form-control director-dependent" id="othershare_${i}" name="directors[other_shareholdings_details][]" placeholder="If yes, specify">
        </td>

        <td>
          <select class="form-control" name="directors[broadcasting_act_shareholding][]" required>
            <option value="">Select</option>
            <option value="no">No</option>
            <option value="yes">Yes</option>
          </select>
        </td>
        <td>
          <select class="form-control" name="directors[postal_telecom_act_shareholding][]" required>
            <option value="">Select</option>
            <option value="no">No</option>
            <option value="yes">Yes</option>
          </select>
        </td>
        <td>
          <select class="form-control" name="directors[advertising_agency_shareholding][]" required>
            <option value="">Select</option>
            <option value="no">No</option>
            <option value="yes">Yes</option>
          </select>
        </td>

        <td class="text-center">
          <button type="button" class="btn btn-light btn-sm remove-row"><i class="ri-close-line"></i></button>
        </td>
      </tr>
    `;
  }

  function addDirectorRow() {
    const tbody = document.getElementById('directorsRows');
    if (!tbody) return;
    directorIdx++;
    tbody.insertAdjacentHTML('beforeend', directorRowHtml(directorIdx));
    wireRowActions();
    applyDirectorDependencies(); // keep consistent
  }

  let smIdx = 0;
  function seniorManagerRowHtml(i) {
    return `
      <tr data-row="${i}">
        <td><input class="form-control" name="senior_managers[name][]" required></td>
        <td><input class="form-control" name="senior_managers[surname][]" required></td>
        <td><input class="form-control" name="senior_managers[nationality][]" required></td>
        <td><input class="form-control" name="senior_managers[qualifications][]" required></td>
        <td class="text-center">
          <button type="button" class="btn btn-light btn-sm remove-row"><i class="ri-close-line"></i></button>
        </td>
      </tr>
    `;
  }

  function addSeniorManagerRow() {
    const tbody = document.getElementById('seniorManagersRows');
    if (!tbody) return;
    smIdx++;
    tbody.insertAdjacentHTML('beforeend', seniorManagerRowHtml(smIdx));
    wireRowActions();
  }

  let repShareIdx = 0;
  function repShareholderRowHtml(i) {
    return `
      <tr data-row="${i}">
        <td><input class="form-control" name="rep_office_shareholders[name][]" required></td>
        <td><input class="form-control" type="number" name="rep_office_shareholders[percent][]" min="0" max="100" step="0.01" required></td>
        <td class="text-center">
          <button type="button" class="btn btn-light btn-sm remove-row"><i class="ri-close-line"></i></button>
        </td>
      </tr>
    `;
  }

  function addRepShareholderRow() {
    const tbody = document.getElementById('repOfficeShareholdersRows');
    if (!tbody) return;
    repShareIdx++;
    tbody.insertAdjacentHTML('beforeend', repShareholderRowHtml(repShareIdx));
    wireRowActions();
  }

  let repShareIdx = 0;
  function repShareholderRowHtml(i) {
    return `
      <tr data-row="${i}">
        <td><input class="form-control" name="rep_office_shareholders[name][]" required></td>
        <td><input class="form-control" type="number" name="rep_office_shareholders[percent][]" min="0" max="100" step="0.01" required></td>
        <td class="text-center">
          <button type="button" class="btn btn-light btn-sm remove-row"><i class="ri-close-line"></i></button>
        </td>
      </tr>
    `;
  }

  function addRepShareholderRow() {
    const tbody = document.getElementById('repOfficeShareholdersRows');
    if (!tbody) return;
    repShareIdx++;
    tbody.insertAdjacentHTML('beforeend', repShareholderRowHtml(repShareIdx));
    wireRowActions();
  }

  function wireRowActions() {
    document.querySelectorAll('.remove-row').forEach(btn => {
      btn.onclick = (e) => {
        const tr = e.currentTarget.closest('tr');
        if (tr) tr.remove();
      };
    });

    document.querySelectorAll('.director-toggle').forEach(sel => {
      sel.onchange = applyDirectorDependencies;
    });
  }

  function applyDirectorDependencies() {
    document.querySelectorAll('.director-toggle').forEach(sel => {
      const targetId = sel.dataset.target;
      const target = document.getElementById(targetId);
      if (!target) return;

      if (sel.value === 'yes') {
        target.removeAttribute('disabled');
      } else {
        target.value = '';
        target.setAttribute('disabled', 'disabled');
      }
    });
  }

  // ===== Upload UI + Preview storage =====
  function ap1SetupUploads() {
    document.querySelectorAll('#new-registration-page .upload-btn').forEach(btn => {
      btn.addEventListener('click', function() {
        const input = this.parentElement.querySelector('input[type="file"]');
        if (input) input.click();
      });
    });

    document.querySelectorAll('#new-registration-page .upload-area input[type="file"]').forEach(input => {
      input.addEventListener('change', function() {
        const file = this.files && this.files[0];
        const docType = this.dataset.docType;

        if (docType) ap1SelectedDocs[docType] = file || null;

        const area = this.closest('.upload-area');
        const list = area?.parentElement?.querySelector('.uploaded-files');

        if (area) {
          if (file) {
            area.style.borderColor = '#10b981';
            area.style.backgroundColor = 'rgba(16, 185, 129, 0.05)';
          } else {
            area.style.borderColor = '';
            area.style.backgroundColor = '';
          }
        }

        if (list) {
          if (!file) { list.innerHTML = ''; return; }

          const fileName = file.name.length > 32 ? file.name.slice(0, 32) + '...' : file.name;
          const size = (file.size / 1024).toFixed(1) + ' KB';

          list.innerHTML = `
            <div class="uploaded-file d-flex align-items-center justify-content-between p-2 border rounded mb-2">
              <div class="d-flex align-items-center gap-2">
                <i class="ri-file-text-line file-icon"></i>
                <div>
                  <div class="file-name fw-semibold" style="font-size:13px;">${escapeHtml(fileName)}</div>
                  <div class="file-size text-muted" style="font-size:11px;">${escapeHtml(size)}</div>
                </div>
              </div>
              <button type="button" class="btn btn-sm btn-light">Remove</button>
            </div>
          `;

          list.querySelector('button')?.addEventListener('click', () => {
            input.value = '';
            if (docType) ap1SelectedDocs[docType] = null;
            list.innerHTML = '';
            if (area) { area.style.borderColor = ''; area.style.backgroundColor = ''; }
          });
        }
      });
    });
  }

  // ===== Collect Form Data (Text only) =====
  function getFormData() {
    const formData = {};
    const inputs = document.querySelectorAll('#ap1Form input, #ap1Form select, #ap1Form textarea');

    inputs.forEach(input => {
      if (input.type === 'file') return;
      if (!input.name && !input.id) return;

      const key = input.name || input.id;

      // radio handling
      if (input.type === 'radio') {
        if (input.checked) formData[key] = input.value;
        return;
      }

      // checkbox
      if (input.type === 'checkbox') {
        formData[key] = input.checked;
        return;
      }

      formData[key] = input.value;
    });

    // Foreign specific: get radio values manually for safety
    formData.foreign_media_type = document.querySelector('input[name="foreign_media_type"]:checked')?.value || null;
    formData.rep_office_wholly_owned = document.querySelector('input[name="rep_office_wholly_owned"]:checked')?.value || null;

    // Directors table -> structured array
    formData.directors = [];
    const directorRows = document.querySelectorAll('#directorsRows tr');
    directorRows.forEach(tr => {
      const row = {
        name: tr.querySelector('[name="directors[name][]"]')?.value || '',
        surname: tr.querySelector('[name="directors[surname][]"]')?.value || '',
        address: tr.querySelector('[name="directors[address][]"]')?.value || '',
        occupation: tr.querySelector('[name="directors[occupation][]"]')?.value || '',
        nationality: tr.querySelector('[name="directors[nationality][]"]')?.value || '',
        shareholding_percent: tr.querySelector('[name="directors[shareholding_percent][]"]')?.value || '',

        other_directorships: tr.querySelector('[name="directors[other_directorships][]"]')?.value || '',
        companies_concerned: tr.querySelector('[name="directors[companies_concerned][]"]')?.value || '',

        public_political_office: tr.querySelector('[name="directors[public_political_office][]"]')?.value || '',
        public_political_details: tr.querySelector('[name="directors[public_political_details][]"]')?.value || '',

        other_shareholdings: tr.querySelector('[name="directors[other_shareholdings][]"]')?.value || '',
        other_shareholdings_details: tr.querySelector('[name="directors[other_shareholdings_details][]"]')?.value || '',

        broadcasting_act_shareholding: tr.querySelector('[name="directors[broadcasting_act_shareholding][]"]')?.value || '',
        postal_telecom_act_shareholding: tr.querySelector('[name="directors[postal_telecom_act_shareholding][]"]')?.value || '',
        advertising_agency_shareholding: tr.querySelector('[name="directors[advertising_agency_shareholding][]"]')?.value || '',
      };

      const hasAny = Object.values(row).some(v => String(v).trim() !== '');
      if (hasAny) formData.directors.push(row);
    });

    // Senior managers -> structured array
    formData.senior_managers = [];
    const smRows = document.querySelectorAll('#seniorManagersRows tr');
    smRows.forEach(tr => {
      const row = {
        name: tr.querySelector('[name="senior_managers[name][]"]')?.value || '',
        surname: tr.querySelector('[name="senior_managers[surname][]"]')?.value || '',
        nationality: tr.querySelector('[name="senior_managers[nationality][]"]')?.value || '',
        qualifications: tr.querySelector('[name="senior_managers[qualifications][]"]')?.value || '',
      };
      const hasAny = Object.values(row).some(v => String(v).trim() !== '');
      if (hasAny) formData.senior_managers.push(row);
    });

    // Representative Office Shareholders
    formData.rep_office_shareholders = [];
    const repRows = document.querySelectorAll('#repOfficeShareholdersRows tr');
    repRows.forEach(tr => {
      const row = {
        name: tr.querySelector('[name="rep_office_shareholders[name][]"]')?.value || '',
        percent: tr.querySelector('[name="rep_office_shareholders[percent][]"]')?.value || '',
      };
      if (row.name || row.percent) formData.rep_office_shareholders.push(row);
    });

    return formData;
  }

  // ===== Review (with file previews) =====
  function buildDocsPreviewHtml() {
    const entries = Object.keys(ap1SelectedDocs).map(docType => {
      const file = ap1SelectedDocs[docType];
      if (!file) return '';

      const safeName = escapeHtml(file.name);
      const ext = (file.name.split('.').pop() || '').toLowerCase();
      const mime = (file.type || '').toLowerCase();

      let preview = `<div class="text-muted small">Preview not available</div>`;
      if (ext === 'pdf' || mime.includes('pdf')) {
        const url = URL.createObjectURL(file);
        ap1ObjectUrls.push(url);
        preview = `
          <div class="border rounded overflow-hidden" style="height:420px;">
            <iframe src="${url}" style="width:100%;height:100%;border:0;"></iframe>
          </div>
        `;
      } else if (mime.startsWith('image/')) {
        const url = URL.createObjectURL(file);
        ap1ObjectUrls.push(url);
        preview = `
          <div class="border rounded p-2">
            <img src="${url}" alt="${safeName}" style="max-width:100%;height:auto;">
          </div>
        `;
      } else if (ext === 'zip') {
        preview = `<div class="alert alert-light border mb-0">ZIP file attached (cannot preview). (${safeName})</div>`;
      }

      return `
        <div class="mb-4">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <div class="fw-semibold">${escapeHtml(docType.replaceAll('_',' ').toUpperCase())}</div>
            <div class="small text-muted">${safeName}</div>
          </div>
          ${preview}
        </div>
      `;
    }).join('');

    if (!entries.trim()) {
      return `<div class="alert alert-danger border mb-0"><i class="ri-error-warning-line me-2"></i>No documents have been uploaded.</div>`;
    }

    return entries;
  }

  function showReviewModal() {
    const fd = getFormData();

    const scope = (fd.registration_scope === 'foreign') ? 'Foreign Media House' : 'Local Media House';
    const regionText = document.querySelector('select[name="collection_region"]')?.selectedOptions?.[0]?.text || '-';

    const directorsHtml = (fd.directors || []).length ? `
      <div class="table-responsive">
        <table class="table table-sm table-bordered align-middle">
          <thead>
            <tr>
              <th>#</th><th>Name</th><th>Surname</th><th>Nationality</th><th>Occupation</th><th>%</th>
              <th>Other Directorships</th><th>Public/Political Office</th><th>Other Shareholdings</th>
              <th>Broadcasting Act</th><th>Postal/Telecom Act</th><th>Advertising Agency</th>
            </tr>
          </thead>
          <tbody>
            ${(fd.directors || []).map((d,i)=>`
              <tr>
                <td>${i+1}</td>
                <td>${escapeHtml(d.name||'-')}</td>
                <td>${escapeHtml(d.surname||'-')}</td>
                <td>${escapeHtml(d.nationality||'-')}</td>
                <td>${escapeHtml(d.occupation||'-')}</td>
                <td>${escapeHtml(d.shareholding_percent||'-')}</td>
                <td>${escapeHtml(d.other_directorships||'-')} ${d.companies_concerned ? '— ' + escapeHtml(d.companies_concerned) : ''}</td>
                <td>${escapeHtml(d.public_political_office||'-')} ${d.public_political_details ? '— ' + escapeHtml(d.public_political_details) : ''}</td>
                <td>${escapeHtml(d.other_shareholdings||'-')} ${d.other_shareholdings_details ? '— ' + escapeHtml(d.other_shareholdings_details) : ''}</td>
                <td>${escapeHtml(d.broadcasting_act_shareholding||'-')}</td>
                <td>${escapeHtml(d.postal_telecom_act_shareholding||'-')}</td>
                <td>${escapeHtml(d.advertising_agency_shareholding||'-')}</td>
              </tr>
            `).join('')}
          </tbody>
        </table>
      </div>
    ` : `<div class="alert alert-light border mb-0">No directors/shareholding rows provided.</div>`;

    const smHtml = (fd.senior_managers || []).length ? `
      <div class="table-responsive">
        <table class="table table-sm table-bordered align-middle">
          <thead><tr><th>#</th><th>Name</th><th>Surname</th><th>Nationality</th><th>Qualifications</th></tr></thead>
          <tbody>
            ${(fd.senior_managers || []).map((m,i)=>`
              <tr>
                <td>${i+1}</td>
                <td>${escapeHtml(m.name||'-')}</td>
                <td>${escapeHtml(m.surname||'-')}</td>
                <td>${escapeHtml(m.nationality||'-')}</td>
                <td>${escapeHtml(m.qualifications||'-')}</td>
              </tr>
            `).join('')}
          </tbody>
        </table>
      </div>
    ` : `<div class="alert alert-light border mb-0">No senior manager rows provided.</div>`;

    const radioBlock = (fd.mass_media_activity === 'Radio') ? `
      <div class="mt-2">
        <div><strong>Radio Titles Published:</strong> ${escapeHtml(fd.radio_titles_published||'-')}</div>
        <div><strong>Frequency:</strong> ${escapeHtml(fd.radio_frequency||'-')}</div>
        <div><strong>Circulation Figures:</strong> ${escapeHtml(fd.radio_circulation_figures||'-')}</div>
        <div><strong>General News:</strong> ${escapeHtml(fd.radio_general_news||'-')}</div>
        <div><strong>Specialized Information:</strong> ${escapeHtml(fd.radio_specialized_info||'-')}</div>
        <div><strong>Details:</strong> ${escapeHtml(fd.radio_specialized_details||'-')}</div>
      </div>
    ` : '';

    const reviewHtml = `
      <div class="review-section">
        <h6 class="fw-bold border-bottom pb-2 mb-3"><i class="ri-building-2-line me-2"></i>Registration Type</h6>
        <p><strong>Type:</strong> ${escapeHtml(scope)}</p>
      </div>

      <div class="review-section mt-4">
        <h6 class="fw-bold border-bottom pb-2 mb-3"><i class="ri-user-3-line me-2"></i>Contact Person</h6>
        <div class="row">
          <div class="col-6"><p><strong>Name:</strong> ${escapeHtml(fd.contact_name||'-')}</p></div>
          <div class="col-6"><p><strong>Surname:</strong> ${escapeHtml(fd.contact_surname||'-')}</p></div>
          <div class="col-12"><p><strong>Address:</strong> ${escapeHtml(fd.contact_address||'-')}</p></div>
          <div class="col-6"><p><strong>Phone:</strong> ${escapeHtml((fd.contact_phone_country_code||'') + ' ' + (fd.contact_phone||'-'))}</p></div>
          <div class="col-6"><p><strong>Email:</strong> ${escapeHtml(fd.contact_email||'-')}</p></div>
          <div class="col-12"><p><strong>Collection Office:</strong> ${escapeHtml(regionText)}</p></div>
        </div>
      </div>

      <div class="review-section mt-4">
        <h6 class="fw-bold border-bottom pb-2 mb-3"><i class="ri-organization-chart me-2"></i>Organization Details</h6>
        <p><strong>Mass Media Category:</strong> ${escapeHtml(fd.mass_media_category||'-')}</p>
        
        <div class="registration-local-only" ${fd.registration_scope === 'foreign' ? 'style="display:none;"' : ''}>
            <p><strong>Mass Media Activity:</strong> ${escapeHtml(fd.mass_media_activity||'-')} ${fd.mass_media_activity==='Other' ? ('— ' + escapeHtml(fd.mass_media_activity_other||'')) : ''}</p>
            ${radioBlock}
        </div>

        <div class="registration-foreign-only" ${fd.registration_scope !== 'foreign' ? 'style="display:none;"' : ''}>
            <p><strong>Media House Type:</strong> ${escapeHtml(fd.foreign_media_type||'-')}</p>
            <p><strong>Organization Name:</strong> ${escapeHtml(fd.org_name||'-')}</p>
            <p><strong>Head Office Address:</strong> ${escapeHtml(fd.org_head_office||'-')}</p>
            <p><strong>Mailing Address:</strong> ${escapeHtml(fd.org_mailing_address||'-')}</p>
            
            <div class="mt-3 p-3 border rounded bg-light">
                <h6 class="fw-bold border-bottom pb-1 mb-2"><i class="ri-hotel-line me-2"></i>Representative Office</h6>
                <p><strong>Office Name:</strong> ${escapeHtml(fd.rep_office_name||'-')}</p>
                <p><strong>Physical Address:</strong> ${escapeHtml(fd.rep_office_address||'-')}</p>
                <p><strong>Email:</strong> ${escapeHtml(fd.rep_office_email||'-')}</p>
                <div class="mb-2"><strong>Activities Description:</strong><br>${escapeHtml(fd.rep_office_activities||'-')}</div>
                <p><strong>Wholly Owned:</strong> ${escapeHtml(fd.rep_office_wholly_owned||'-')}</p>
                
                ${(fd.rep_office_shareholders || []).length ? `
                    <div class="table-responsive mt-2">
                        <table class="table table-sm table-bordered bg-white">
                            <thead><tr><th>Shareholder Name</th><th>Share %</th></tr></thead>
                            <tbody>
                                ${(fd.rep_office_shareholders || []).map(s => `
                                    <tr><td>${escapeHtml(s.name)}</td><td>${escapeHtml(s.percent)}%</td></tr>
                                `).join('')}
                            </tbody>
                        </table>
                    </div>
                ` : ''}
            </div>
        </div>
      </div>

      <div class="review-section mt-4">
        <h6 class="fw-bold border-bottom pb-2 mb-3"><i class="ri-team-line me-2"></i>Directors & Shareholding</h6>
        ${directorsHtml}
      </div>

      <div class="review-section mt-4">
        <h6 class="fw-bold border-bottom pb-2 mb-3"><i class="ri-user-star-line me-2"></i>CEO</h6>
        <div class="row">
          <div class="col-6"><p><strong>Name:</strong> ${escapeHtml(fd.ceo_name||'-')}</p></div>
          <div class="col-6"><p><strong>Surname:</strong> ${escapeHtml(fd.ceo_surname||'-')}</p></div>
          <div class="col-6"><p><strong>Nationality:</strong> ${escapeHtml(fd.ceo_nationality||'-')}</p></div>
          <div class="col-6"><p><strong>Qualifications:</strong> ${escapeHtml(fd.ceo_qualifications||'-')}</p></div>
          <div class="col-12"><p><strong>Experience:</strong> ${escapeHtml(fd.ceo_experience||'-')}</p></div>
        </div>
      </div>

      <div class="review-section mt-4">
        <h6 class="fw-bold border-bottom pb-2 mb-3"><i class="ri-team-line me-2"></i>Senior Managers</h6>
        ${smHtml}
      </div>

      <div class="review-section mt-4">
        <h6 class="fw-bold border-bottom pb-2 mb-3"><i class="ri-questionnaire-line me-2"></i>Questions</h6>
        <p><strong>Convicted offence:</strong> ${escapeHtml(fd.q_convicted||'-')} ${fd.q_convicted_details ? '— ' + escapeHtml(fd.q_convicted_details) : ''}</p>
        <p><strong>Judgment debt:</strong> ${escapeHtml(fd.q_judgment_debt||'-')} ${fd.q_judgment_debt_details ? '— ' + escapeHtml(fd.q_judgment_debt_details) : ''}</p>
        <p><strong>Insolvency:</strong> a=${escapeHtml(fd.q_insolvent_a||'-')}, b=${escapeHtml(fd.q_insolvent_b||'-')}, c=${escapeHtml(fd.q_insolvent_c||'-')}, d=${escapeHtml(fd.q_insolvent_d||'-')}</p>
        <p><strong>Insolvency details:</strong> ${escapeHtml(fd.q_insolvent_details||'-')}</p>
        ${fd.other_relevant_info ? `<div class="mt-2 text-muted small"><strong>Other Relevant Information:</strong><br>${escapeHtml(fd.other_relevant_info)}</div>` : ''}
      </div>

      <div class="review-section mt-4">
        <h6 class="fw-bold border-bottom pb-2 mb-3"><i class="ri-attachment-2 me-2"></i>Uploads</h6>
        ${buildDocsPreviewHtml()}
      </div>

      <div class="review-section mt-4">
        <h6 class="fw-bold border-bottom pb-2 mb-3"><i class="ri-checkbox-circle-line me-2"></i>Declaration</h6>
        <p><strong>Agreed:</strong> ${fd.declaration_agreed ? 'Yes' : 'No'}</p>
      </div>

      <div class="alert alert-warning mt-4 mb-0">
        <i class="ri-information-line me-2"></i>
        Please review all information carefully before submitting.
      </div>
    `;

    document.getElementById('ap1ReviewContent').innerHTML = reviewHtml;

    const modalEl = document.getElementById('ap1ReviewModal');
    const modal = new bootstrap.Modal(modalEl);
    modal.show();

    modalEl.addEventListener('hidden.bs.modal', function cleanup() {
      ap1ObjectUrls.forEach(u => { try { URL.revokeObjectURL(u); } catch(e){} });
      ap1ObjectUrls.length = 0;
      modalEl.removeEventListener('hidden.bs.modal', cleanup);
    });
  }

  // ===== Save Draft (multipart + files) =====
  async function saveDraft() {
    const data = getFormData();
    const region = document.querySelector('select[name="collection_region"]')?.value || '';

    const btn = document.getElementById('ap1SaveDraftBtn');
    try {
      btn.disabled = true;
      btn.innerHTML = '<i class="ri-loader-4-line"></i> Saving...';

      const fd = new FormData();
      fd.append('collection_region', region);
      fd.append('form_data', JSON.stringify(data));

      document.querySelectorAll('#ap1Form input[type="file"][name^="documents"]').forEach(input => {
        if (input.files && input.files[0]) fd.append(input.name, input.files[0]);
      });

      const res = await fetch('{{ route("mediahouse.saveDraft") }}', {
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json' },
        body: fd,
      });

      const json = await res.json();
      if (res.ok && json.success) {
        alert('Draft saved successfully (including uploads).');
      } else {
        alert(json.message || 'Failed to save draft.');
      }
    } catch (e) {
      console.error(e);
      alert('An error occurred while saving draft.');
    } finally {
      btn.disabled = false;
      btn.innerHTML = '<i class="ri-save-line"></i> Save Draft';
    }
  }

  // ===== Submit (multipart + files) =====
  async function submitApplication() {
    const data = getFormData();
    const region = document.querySelector('select[name="collection_region"]')?.value || '';
    const btn = document.getElementById('ap1ConfirmSubmitBtn');

    try {
      btn.disabled = true;
      btn.innerHTML = '<i class="ri-loader-4-line"></i> Submitting...';

      const fd = new FormData();
      fd.append('collection_region', region);
      fd.append('form_data', JSON.stringify(data));

      document.querySelectorAll('#ap1Form input[type="file"][name^="documents"]').forEach(input => {
        if (input.files && input.files[0]) fd.append(input.name, input.files[0]);
      });

      const submitUrl = @json(isset($draft) && !$draft->is_draft && ($draft->status ?? null) === \App\Models\Application::CORRECTION_REQUESTED
        ? route('mediahouse.applications.resubmit', $draft)
        : route('mediahouse.submit'));

      const res = await fetch(submitUrl, {
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json' },
        body: fd,
      });

      const json = await res.json();
      if (res.ok && json.success) {
        bootstrap.Modal.getInstance(document.getElementById('ap1ReviewModal'))?.hide();
        alert('Application submitted successfully! Reference: ' + json.reference);
        window.location.href = "{{ route('mediahouse.portal') }}";
      } else {
        alert(json.message || 'Failed to submit.');
      }
    } catch (e) {
      console.error(e);
      alert('An error occurred while submitting.');
    } finally {
      btn.disabled = false;
      btn.innerHTML = '<i class="ri-send-plane-line me-2"></i>Confirm & Submit';
    }
  }

  // ===== Scope selection cards =====
  function bindScopeCards() {
    console.log('Binding scope cards...');
    const cards = document.querySelectorAll('#new-registration-page .app-type-card');
    console.log('Found cards:', cards.length);
    cards.forEach(card => {
      card.addEventListener('click', () => {
        console.log('Card clicked:', card.dataset.type);
        document.querySelectorAll('#new-registration-page .app-type-card').forEach(c => c.classList.remove('selected'));
        card.classList.add('selected');
        document.getElementById('ap1_registration_scope').value = card.dataset.type;
        applyScopeVisibility();
      });
    });
  }

  document.addEventListener('DOMContentLoaded', () => {
    console.log('DOM Content Loaded - Registration Form');
    ap1UpdateSteps();
    ap1SetupUploads();
    bindScopeCards();
    console.log('Setup calls completed');

    // default rows
    addDirectorRow();
    addSeniorManagerRow();

    // activity dynamic
    document.getElementById('mass_media_activity')?.addEventListener('change', applyActivityVisibility);
    applyActivityVisibility();

    // nav
    document.getElementById('ap1PrevBtn')?.addEventListener('click', () => {
      ap1Step = Math.max(1, ap1Step - 1);
      ap1UpdateSteps();
    });

    document.getElementById('ap1NextBtn')?.addEventListener('click', () => {
      if (!ap1ValidateStep()) return;
      if (ap1Step === 7) { showReviewModal(); return; }
      ap1Step = Math.min(7, ap1Step + 1);
      ap1UpdateSteps();
    });

    document.getElementById('ap1SaveDraftBtn')?.addEventListener('click', saveDraft);
    document.getElementById('ap1ConfirmSubmitBtn')?.addEventListener('click', submitApplication);

    document.getElementById('addDirectorRowBtn')?.addEventListener('click', addDirectorRow);
    document.getElementById('addSeniorManagerBtn')?.addEventListener('click', addSeniorManagerRow);

    // Draft restore
    @if(isset($draft) && $draft)
      const draftData = @json($draft->form_data ?? []);
      if (draftData && typeof draftData === 'object') {
        // fill plain fields
        Object.keys(draftData).forEach(key => {
          if (key === 'directors' || key === 'senior_managers') return;

          const el = document.querySelector(`[name="${key}"]`) || document.getElementById(key);
          if (!el) return;

          if (el.type === 'radio') {
            const r = document.querySelector(`[name="${key}"][value="${draftData[key]}"]`);
            if (r) r.checked = true;
          } else if (el.type === 'checkbox') {
            el.checked = !!draftData[key];
          } else {
            el.value = draftData[key];
          }
        });

        // scope card highlight
        if (draftData.registration_scope) {
          const scopeCard = document.querySelector(`.app-type-card[data-type="${draftData.registration_scope}"]`);
          if (scopeCard) scopeCard.click();
        }

        // directors
        if (Array.isArray(draftData.directors)) {
          const tbody = document.getElementById('directorsRows');
          if (tbody) tbody.innerHTML = '';
          directorIdx = 0;
          draftData.directors.forEach(() => addDirectorRow());

          const rows = document.querySelectorAll('#directorsRows tr');
          draftData.directors.forEach((d, i) => {
            const tr = rows[i];
            if (!tr) return;

            tr.querySelector('[name="directors[name][]"]').value = d.name || '';
            tr.querySelector('[name="directors[surname][]"]').value = d.surname || '';
            tr.querySelector('[name="directors[address][]"]').value = d.address || '';
            tr.querySelector('[name="directors[occupation][]"]').value = d.occupation || '';
            tr.querySelector('[name="directors[nationality][]"]').value = d.nationality || '';
            tr.querySelector('[name="directors[shareholding_percent][]"]').value = d.shareholding_percent || '';

            tr.querySelector('[name="directors[other_directorships][]"]').value = d.other_directorships || '';
            tr.querySelector('[name="directors[companies_concerned][]"]').value = d.companies_concerned || '';

            tr.querySelector('[name="directors[public_political_office][]"]').value = d.public_political_office || '';
            tr.querySelector('[name="directors[public_political_details][]"]').value = d.public_political_details || '';

            tr.querySelector('[name="directors[other_shareholdings][]"]').value = d.other_shareholdings || '';
            tr.querySelector('[name="directors[other_shareholdings_details][]"]').value = d.other_shareholdings_details || '';

            tr.querySelector('[name="directors[broadcasting_act_shareholding][]"]').value = d.broadcasting_act_shareholding || '';
            tr.querySelector('[name="directors[postal_telecom_act_shareholding][]"]').value = d.postal_telecom_act_shareholding || '';
            tr.querySelector('[name="directors[advertising_agency_shareholding][]"]').value = d.advertising_agency_shareholding || '';
          });

          applyDirectorDependencies();
        }

        // senior managers
        if (Array.isArray(draftData.senior_managers)) {
          const tbody = document.getElementById('seniorManagersRows');
          if (tbody) tbody.innerHTML = '';
          smIdx = 0;
          draftData.senior_managers.forEach(() => addSeniorManagerRow());

          const rows = document.querySelectorAll('#seniorManagersRows tr');
          draftData.senior_managers.forEach((m, i) => {
            const tr = rows[i];
            if (!tr) return;
            tr.querySelector('[name="senior_managers[name][]"]').value = m.name || '';
            tr.querySelector('[name="senior_managers[surname][]"]').value = m.surname || '';
            tr.querySelector('[name="senior_managers[nationality][]"]').value = m.nationality || '';
            tr.querySelector('[name="senior_managers[qualifications][]"]').value = m.qualifications || '';
          });
        }

        // representative office shareholders
        if (Array.isArray(draftData.rep_office_shareholders)) {
          const tbody = document.getElementById('repOfficeShareholdersRows');
          if (tbody) tbody.innerHTML = '';
          repShareIdx = 0;
          draftData.rep_office_shareholders.forEach(() => addRepShareholderRow());

          const rows = document.querySelectorAll('#repOfficeShareholdersRows tr');
          draftData.rep_office_shareholders.forEach((s, i) => {
            const tr = rows[i];
            if (!tr) return;
            tr.querySelector('[name="rep_office_shareholders[name][]"]').value = s.name || '';
            tr.querySelector('[name="rep_office_shareholders[percent][]"]').value = s.percent || '';
          });
        }

        // activity visibility
        applyActivityVisibility();
        applyScopeVisibility();
        applyWhollyOwnedVisibility();
      }
    @endif

    // Bind wholly owned toggle
    document.querySelectorAll('.wholly-owned-toggle').forEach(r => {
        r.addEventListener('change', applyWhollyOwnedVisibility);
    });
    document.getElementById('addRepShareholderBtn')?.addEventListener('click', addRepShareholderRow);

  });
</script>
