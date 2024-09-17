<?php

namespace App\Services\Mail;

class MemberMailService extends TechVillageMail
{

    /**
     * Send mail to team member 
     *
     * @param  object  $request
     * @return array|object
     */
    public function send($request)
    {
        $email = $this->getTemplate(preference('dflt_lang'), 'member-invitation');
        if (!$email['status']) {
            return $email;
        }
        // Replacing template variable
        $subject = str_replace('{company_name}', $this->companyName, $email->subject);

        $data = [
            '{logo}' => $this->logo, 
            '{company_name}' => $this->companyName,
            '{support_mail}' => $this->companyEmail,
            '{member_invitation_url}' => $request->member_url
        ];

        $message = str_replace(array_keys($data), $data, $email->body);

        return $this->email->sendEmail($request->email, $subject, $message, null, $this->companyName);
    }
}
