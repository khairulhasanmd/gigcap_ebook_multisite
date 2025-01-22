<?php $all_affiliate_partners = get_all_affiliate_partners(); ?>
<thead>
    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
        <th>Affiliate Partners</th>
        <th>Pub ID</th>
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
    @if($an == '' || $an == 'all')
        @foreach($all_affiliate_partners as $an1)
        <?php $printed = false; $all_pubs = total_signups_transactions_pubids($concept, $from_date, $to_date, '', $an1->affiliate_network);
        foreach ($all_pubs as $pub) { ?>
            <?php if(!$printed){ ?>
            <tr><td class="fw-bolder text-gray-800 text-hover-primary mb-1" rowspan="{{ count($all_pubs) }}"><?php echo $an1->affiliate_network;$printed = true; ?></td> <?php } else { echo '<tr>'; } ?>
                <?php $dta = total_signups_transactions_from_to_pubid($concept, $from_date, $to_date, '', $an1->affiliate_network, $pub->pub_id); ?>
                <td>{{ $pub->pub_id; }}</td>
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
            <?php } ?>
        @endforeach
    @else
    <?php $printed = false; $all_pubs = total_signups_transactions_pubids($concept, $from_date, $to_date, '', $an);
    foreach ($all_pubs as $pub) { ?>
        <?php if(!$printed){ ?>
        <tr><td class="fw-bolder text-gray-800 text-hover-primary mb-1" rowspan="{{ count($all_pubs) }}"><?php echo $an;$printed = true; ?></td> <?php } else { echo '<tr>'; } ?>
            <?php $dta = total_signups_transactions_from_to_pubid($concept, $from_date, $to_date, '', $an, $pub->pub_id); ?>
            <td>{{ $pub->pub_id; }}</td>
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
        <?php } ?>
    @endif
</tbody>