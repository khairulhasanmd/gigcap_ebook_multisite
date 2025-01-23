<thead>
    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
        <th>Concept</th>
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
    <?php if($concept == 'vivoebook' || $concept == 'all'){ ?>
    <tr>
        <?php $dta = total_signups_transactions_from_to('vivoebook', $from_date, $to_date, '', ''); ?>
        <td class="fw-bolder text-gray-800 text-hover-primary mb-1">Vivoebook</td>
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
    <?php }if($concept == 'vivaebook' || $concept == 'all'){ ?>
    <tr>
        <?php $dta = total_signups_transactions_from_to('vivaebook', $from_date, $to_date, '', ''); ?>
        <td class="fw-bolder text-gray-800 text-hover-primary mb-1">Vivaebook</td>
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
    <?php }if($concept == 'ebookboth' || $concept == 'all'){ ?>
    <tr>
        <?php $dta = total_signups_transactions_from_to('ebookboth', $from_date, $to_date, '', ''); ?>
        <td class="fw-bolder text-gray-800 text-hover-primary mb-1">Ebookbooth</td>
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
</tbody>                                            
