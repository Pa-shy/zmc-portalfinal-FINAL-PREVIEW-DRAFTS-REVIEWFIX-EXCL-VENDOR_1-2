<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Receipt - <?php echo e($application->reference); ?></title>
    <style>
        body { font-family: 'Helvetica', sans-serif; color: #334155; line-height: 1.5; font-size: 14px; }
        .container { padding: 40px; }
        .header { display: table; width: 100%; border-bottom: 2px solid #e2e8f0; padding-bottom: 20px; margin-bottom: 30px; }
        .company-info { display: table-cell; vertical-align: top; }
        .receipt-label { display: table-cell; vertical-align: top; text-align: right; }
        .receipt-label h1 { margin: 0; color: #1e293b; font-size: 28px; text-transform: uppercase; letter-spacing: 2px; }
        .section { margin-bottom: 30px; }
        .section-title { font-weight: bold; font-size: 12px; text-transform: uppercase; color: #64748b; margin-bottom: 10px; border-bottom: 1px solid #f1f5f9; padding-bottom: 5px; }
        .details-table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .details-table td { padding: 8px 0; vertical-align: top; }
        .details-table td.label { font-weight: bold; width: 30%; color: #475569; }
        .footer { margin-top: 50px; text-align: center; font-size: 12px; color: #94a3b8; border-top: 1px solid #f1f5f9; padding-top: 20px; }
        .amount-box { background: #f8fafc; border: 1px solid #e2e8f0; padding: 20px; text-align: right; border-radius: 8px; }
        .amount-box .total-label { font-size: 14px; color: #64748b; }
        .amount-box .total-value { font-size: 24px; font-weight: bold; color: #1e293b; }
        .badge { display: inline-block; padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: bold; text-transform: uppercase; }
        .badge-success { background-color: #dcfce7; color: #166534; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="company-info">
                <div style="font-weight: bold; font-size: 18px; color: #1e293b;"><?php echo e($company_name); ?></div>
                <div><?php echo e($company_address); ?></div>
                <div><?php echo e($company_phone); ?> | <?php echo e($company_email); ?></div>
            </div>
            <div class="receipt-label">
                <h1>Receipt</h1>
                <div style="margin-top: 10px; color: #64748b;">
                    Reference: <strong><?php echo e($application->reference); ?></strong><br>
                    Date: <?php echo e($date); ?>

                </div>
            </div>
        </div>

        <div class="section">
            <div class="section-title">Recipient</div>
            <div style="font-size: 16px; font-weight: bold; color: #1e293b;"><?php echo e($application->applicant?->name ?? 'N/A'); ?></div>
            <div><?php echo e($application->applicant?->email); ?></div>
            <?php if(isset($application->applicant?->profile_data['address'])): ?>
                <div><?php echo e($application->applicant?->profile_data['address']); ?></div>
            <?php endif; ?>
        </div>

        <div class="section">
            <div class="section-title">Payment Information</div>
            <table class="details-table">
                <tr>
                    <td class="label">Payment For:</td>
                    <td><?php echo e(strtoupper($application->application_type)); ?> Application</td>
                </tr>
                <tr>
                    <td class="label">Request Type:</td>
                    <td><?php echo e(ucfirst($application->request_type ?? 'New')); ?></td>
                </tr>
                <tr>
                    <td class="label">Payment Status:</td>
                    <td><span class="badge badge-success">Paid</span></td>
                </tr>
                <?php if($application->paynow_reference): ?>
                <tr>
                    <td class="label">PayNow Reference:</td>
                    <td><?php echo e($application->paynow_reference); ?></td>
                </tr>
                <?php endif; ?>
            </table>
        </div>

        <div class="amount-box">
            <div class="total-label">Amount Paid</div>
            <div class="total-value">USD/ZIG (Confirmed)</div>
            <div style="font-size: 11px; color: #94a3b8; margin-top: 5px;">* This receipt is valid only for the specified application.</div>
        </div>

        <div class="footer">
            Thank you for your payment. <br>
            © <?php echo e(date('Y')); ?> <?php echo e($company_name); ?>. Generated via ZMC Portal.
        </div>
    </div>
</body>
</html>
<?php /**PATH /home/runner/workspace/resources/views/staff/accounts/receipt_pdf.blade.php ENDPATH**/ ?>