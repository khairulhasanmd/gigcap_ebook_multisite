<?php $all_geo = get_all_geo(); ?>
<thead>
    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
        <th>GEO</th>
        <th>Signups</th>
        <th>Amount</th>
        <th>Avg. Rebill Cycle</th>
        <th>R0</th>
        <th>% of Signups</th>
        <th>Amount</th>
        <th>Total Rebills</th>
        <th>Amount</th>
        <th>Total Amount</th>
    </tr>
</thead>
<tbody>
    @if($geo == '' || $geo == 'all')
        @foreach($all_geo as $geo1)
            <tr>
                <?php $dta = total_signups_transactions_from_to($concept, $from_date, $to_date, $geo1->location, ''); ?>
                <td class="fw-bolder text-gray-800 text-hover-primary mb-1">{{ $geo1->location }}</td>
                <td>{{ $dta->signups.'('.$dta->postback.','.$dta->non_postback.')' }}</td>
                <td>{{ (($dta->signups_amount_EU > 0) ? 'EU('.number_format($dta->signups_amount_EU,2).')':'').(($dta->signups_amount_EU > 0 && $dta->signups_amount_NORTIC > 0)? ', ' : '').(($dta->signups_amount_NORTIC > 0) ? 'NORTIC('.number_format($dta->signups_amount_NORTIC,2).')':'') }}</td>
                <td>{{ number_format(@($dta->total_rebills/($dta->signups == 0 ? 1 : $dta->signups)), 2) }}</td>
    
                <td>{{ $dta->R0 }}</td>
                <td>{{ ($dta->R0 > 0) ? number_format((($dta->R0/$dta->signups)*100),0) : 0 }}%</td>
                <td>{{ (($dta->R0_amount_EU > 0) ? 'EU('.number_format($dta->R0_amount_EU,2).')':'').(($dta->R0_amount_EU > 0 && $dta->R0_amount_NORTIC > 0)? ', ' : '').(($dta->R0_amount_NORTIC > 0) ? 'NORTIC('.number_format($dta->R0_amount_NORTIC,2).')':'') }}</td>
    
                <td>{{ $dta->total_rebills }}</td>
                <td>{{ (($dta->total_amount_EU > 0) ? 'EU('.number_format($dta->total_amount_EU,2).')':'').(($dta->total_amount_EU > 0 && $dta->total_amount_NORTIC > 0)? ', ' : '').(($dta->total_amount_NORTIC > 0) ? 'NORTIC('.number_format($dta->total_amount_NORTIC,2).')':'') }}</td>
                <td>{{ ((($dta->signups_amount_EU + $dta->total_amount_EU) > 0) ? 'EU('.number_format($dta->signups_amount_EU + $dta->total_amount_EU,0).')':'').((($dta->signups_amount_EU + $dta->total_amount_EU) > 0 && ($dta->signups_amount_NORTIC + $dta->total_amount_NORTIC) > 0)? ', ' : '').((($dta->signups_amount_NORTIC + $dta->total_amount_NORTIC) > 0) ? 'NORTIC('.number_format($dta->signups_amount_NORTIC + $dta->total_amount_NORTIC,0).')':'') }}</td>
            </tr>
        @endforeach
    @else
        <tr>
            <?php $dta = total_signups_transactions_from_to($concept, $from_date, $to_date, $geo, ''); ?>
            <td class="fw-bolder text-gray-800 text-hover-primary mb-1">{{ $geo }}</td>
            <td>{{ $dta->signups.'('.$dta->postback.','.$dta->non_postback.')' }}</td>
            <td>{{ (($dta->signups_amount_EU > 0) ? 'EU('.number_format($dta->signups_amount_EU,2).')':'').(($dta->signups_amount_EU > 0 && $dta->signups_amount_NORTIC > 0)? ', ' : '').(($dta->signups_amount_NORTIC > 0) ? 'NORTIC('.number_format($dta->signups_amount_NORTIC,2).')':'') }}</td>
            <td>{{ number_format(@($dta->total_rebills/($dta->signups == 0 ? 1 : $dta->signups)), 2) }}</td>

            <td>{{ $dta->R0 }}</td>
            <td>{{ ($dta->R0 > 0) ? number_format((($dta->R0/$dta->signups)*100),0) : 0 }}%</td>
            <td>{{ (($dta->R0_amount_EU > 0) ? 'EU('.number_format($dta->R0_amount_EU,2).')':'').(($dta->R0_amount_EU > 0 && $dta->R0_amount_NORTIC > 0)? ', ' : '').(($dta->R0_amount_NORTIC > 0) ? 'NORTIC('.number_format($dta->R0_amount_NORTIC,2).')':'') }}</td>

            <td>{{ $dta->total_rebills }}</td>
            <td>{{ (($dta->total_amount_EU > 0) ? 'EU('.number_format($dta->total_amount_EU,2).')':'').(($dta->total_amount_EU > 0 && $dta->total_amount_NORTIC > 0)? ', ' : '').(($dta->total_amount_NORTIC > 0) ? 'NORTIC('.number_format($dta->total_amount_NORTIC,2).')':'') }}</td>
            <td>{{ ((($dta->signups_amount_EU + $dta->total_amount_EU) > 0) ? 'EU('.number_format($dta->signups_amount_EU + $dta->total_amount_EU,0).')':'').((($dta->signups_amount_EU + $dta->total_amount_EU) > 0 && ($dta->signups_amount_NORTIC + $dta->total_amount_NORTIC) > 0)? ', ' : '').((($dta->signups_amount_NORTIC + $dta->total_amount_NORTIC) > 0) ? 'NORTIC('.number_format($dta->signups_amount_NORTIC + $dta->total_amount_NORTIC,0).')':'') }}</td>
        </tr>
    @endif
</tbody>