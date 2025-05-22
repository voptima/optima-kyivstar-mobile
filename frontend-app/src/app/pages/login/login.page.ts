export class LoginPage {
  phone = '';
  code = '';
  step = 1;

  requestCode() {
    console.log('request code');
    this.step = 2;
  }

  verifyCode() {
    console.log('verify code');
  }
}
