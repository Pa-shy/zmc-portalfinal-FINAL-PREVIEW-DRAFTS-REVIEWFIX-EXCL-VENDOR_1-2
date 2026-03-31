

<div class="modal fade" id="<?php echo e($modalId); ?>" tabindex="-1" aria-labelledby="<?php echo e($modalId); ?>Label" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="<?php echo e($modalId); ?>Label">
                    <i class="ri-file-list-line me-2"></i><?php echo e($title); ?>

                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="<?php echo e($modalId); ?>Content">
                    <div class="text-center py-5">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-3 text-muted">Loading details...</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="ri-close-line"></i> Close
                </button>
                <button type="button" class="btn btn-primary" onclick="exportDrillDown<?php echo e($modalId); ?>()">
                    <i class="ri-download-line"></i> Export
                </button>
            </div>
        </div>
    </div>
</div>

<style>
#<?php echo e($modalId); ?> .modal-content {
    border-radius: 8px;
    border: none;
    box-shadow: 0 10px 40px rgba(0,0,0,0.2);
}

#<?php echo e($modalId); ?> .modal-header {
    background: #f9fafb;
    border-bottom: 1px solid #e5e7eb;
    padding: 1.25rem 1.5rem;
}

#<?php echo e($modalId); ?> .modal-title {
    font-size: 1.125rem;
    font-weight: 600;
    color: #1f2937;
}

#<?php echo e($modalId); ?> .modal-body {
    padding: 1.5rem;
    max-height: 70vh;
}

#<?php echo e($modalId); ?> .modal-footer {
    background: #f9fafb;
    border-top: 1px solid #e5e7eb;
    padding: 1rem 1.5rem;
}

#<?php echo e($modalId); ?> .table {
    margin-bottom: 0;
}

#<?php echo e($modalId); ?> .table thead th {
    background: #f3f4f6;
    color: #374151;
    font-weight: 600;
    font-size: 0.875rem;
    text-transform: uppercase;
    letter-spacing: 0.025em;
    border-bottom: 2px solid #e5e7eb;
}

#<?php echo e($modalId); ?> .table tbody tr:hover {
    background: #f9fafb;
}

#<?php echo e($modalId); ?> .alert {
    margin-bottom: 0;
}
</style>

<script>
function show<?php echo e($modalId); ?>(filters = {}) {
    const modal = new bootstrap.Modal(document.getElementById('<?php echo e($modalId); ?>'));
    modal.show();
    
    // Build URL with filters
    const url = new URL('<?php echo e($dataUrl); ?>', window.location.origin);
    Object.keys(filters).forEach(key => {
        if (filters[key]) {
            url.searchParams.append(key, filters[key]);
        }
    });
    
    // Fetch data via AJAX
    fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.text();
        })
        .then(html => {
            document.getElementById('<?php echo e($modalId); ?>Content').innerHTML = html;
        })
        .catch(error => {
            console.error('Error loading drill-down data:', error);
            document.getElementById('<?php echo e($modalId); ?>Content').innerHTML = 
                '<div class="alert alert-danger">' +
                '<i class="ri-error-warning-line me-2"></i>' +
                'Failed to load details. Please try again.' +
                '</div>';
        });
}

function exportDrillDown<?php echo e($modalId); ?>() {
    // Get current modal content
    const content = document.getElementById('<?php echo e($modalId); ?>Content');
    const table = content.querySelector('table');
    
    if (!table) {
        alert('No data available to export');
        return;
    }
    
    // Convert table to CSV
    let csv = [];
    const rows = table.querySelectorAll('tr');
    
    rows.forEach(row => {
        const cols = row.querySelectorAll('td, th');
        const rowData = [];
        cols.forEach(col => {
            rowData.push('"' + col.textContent.trim().replace(/"/g, '""') + '"');
        });
        csv.push(rowData.join(','));
    });
    
    // Download CSV
    const csvContent = csv.join('\n');
    const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
    const link = document.createElement('a');
    const url = URL.createObjectURL(blob);
    
    link.setAttribute('href', url);
    link.setAttribute('download', '<?php echo e($title); ?>_' + new Date().toISOString().split('T')[0] + '.csv');
    link.style.visibility = 'hidden';
    
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}
</script>
<?php /**PATH /home/runner/workspace/resources/views/staff/director/partials/drill-down-modal.blade.php ENDPATH**/ ?>