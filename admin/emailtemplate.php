
<!DOCTYPE html>
   <html>
    <head>
          <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Welcome to {site_name}</title>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
      <style type="text/css">
        td{
          padding: 20px;
          font-family: Open Sans;
        }
        td span{
          font-weight: 600;
        }
      </style>
    </head>
    <body>
      <center>
         <table cellspacing="0" style="border: 2px; width: 500px; height: 70px;text-align: center;">
            <tr>
                <td style="background: #eee; border-bottom: 2px solid #bb342f;"><img src="default/images/logo/logo.png" alt="Logo"></td>
              
            </tr>
           
        </table>

      
        <table cellspacing="0" style="border: 2px; width: 500px; height: 400px;background: #eee;">
            <tr>
                <td>Hello <span>{username}</span>,</td>
            </tr>
            <tr >
               <td><p>We were told that you forgot your password on {username}.</p>
                
                <p>To reeset your password,please click this link: <a>{reset_link}</a></p>
                
               </td>
            </tr>
            <tr>
               <td><p><span>Regard,</span></p>
               <p><span>TogehterMentor</span></p></td>
            </tr>
        </table>
        <table cellspacing="0" style="border: 2px; width: 500px; height: 50px;">
            <tr>
                <td style="background: linear-gradient(to right, #b31217, #e52d27);"><p style="color: #fff; text-align: center;">Copyright © <span>{year}</span>Mentor . All Rights Reserved</p></td>
              
            </tr>
           
        </table>
      </center>
    </body>
</html>


