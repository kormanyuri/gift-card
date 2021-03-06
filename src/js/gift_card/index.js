/**
 * Created by korman on 19.08.17.
 */

import React from 'react';
import ReactDOM from 'react-dom';
import { HashRouter,Route, hashHistory } from 'react-router-dom';
import GiftCardList from './components/gift_card/GiftCardList';
import GiftCard from './components/gift_card/GiftCard';
import Login from './components/user/Login';
import Registration from './components/user/Registration';
import ShopperRegistration from './components/shopper/ShopperRegistration';
import RestorePassword from './components/user/RestorePassword';
import RestorePasswordSuccessful from './components/user/RestorePasswordSuccessful';
import RestorePasswordConfirm from './components/user/RestorePasswordConfirm';
import RestorePasswordForm from './components/user/RestorePasswordForm';
import ChangeName from './components/user/ChangeName';
import ChangePassword from './components/user/ChangePassword';
import MyAccount from './components/user/MyAccount';
import MyRedeemCode from './components/user/MyRedeemCode';
import Balance from './components/balance/Balance';
import BalanceList from './components/balance/BalanceList';
import Auth from './components/user/Auth';

import 'weui';
import 'react-weui/build/packages/react-weui.css';
import './../../../public/css/app.css';


export default class Index extends React.Component{
    constructor(){
        super();
    }

    render(){
        return (
            <HashRouter history={hashHistory}>
                <div>
                    <Route exact path="/" component={GiftCardList}/>
                    <Route exact path="/gift-card/:id" component={GiftCard}/>
                    <Route exact path="/login" component={Login}/>
                    <Route exact path="/registration" component={Registration}/>
                    <Route exact path="/shopper-registration" component={ShopperRegistration}/>
                    <Route exact path="/restore-password" component={RestorePassword}/>
                    <Route exact path="/restore-password-confirm" component={RestorePasswordConfirm}/>
                    <Route exact path="/restore-password-successful" component={RestorePasswordSuccessful}/>
                    <Route exact path="/restore-password-form/:token" component={RestorePasswordForm}/>
                    <Route exact path="/change-name" component={ChangeName}/>
                    <Route exact path="/change-password" component={ChangePassword}/>
                    <Route exact path="/my-account" component={MyAccount}/>
                    <Route exact path="/my-redeem-code" component={MyRedeemCode}/>
                    <Route exact path="/balance" component={Balance}/>
                    <Route exact path="/balance-list" component={BalanceList}/>
                    <Route exact path="/balance-list/:shopperId" component={BalanceList}/>
                </div>
            </HashRouter>
        );
    }
}

const auth = new Auth();
console.log(window.location.hash);
console.log(auth.checkAuth());
const guestPages = [
    '#/login',
    '#/restore-password-confirm',
    '#/restore-password-form'
];

if (!auth.checkAuth() && !guestPages.indexOf(window.location.hash)) {
    window.location = '/#/login';
}

ReactDOM.render(<Index/>, document.getElementById('root'));
