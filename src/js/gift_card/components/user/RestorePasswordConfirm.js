/**
 * Created by korman on 25.09.17.
 */

import React from 'react';
import axios from 'axios';
import ReactDom from 'react-dom';
import Config from '../Config';
import Menu from '../core/Menu';
import Header from '../core/Header';
import {Page, Form,
        FormCell, CellBody, CellHeader, CellFooter, Icon,
        Label, Input, ButtonArea, Button, Toast} from 'react-weui';

export default class RestorePasswordConfirm extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            message: 'To your email send email with instruction by restore'
        };
    }

    goToLogin(){
        window.location = '/#/login';
    }

    render(){
        return (
            <section>
                <Page className="page">
                    <p>
                        {this.state.message}
                    </p>
                    <ButtonArea>
                        <Button onClick={this.goToLogin}>Ok</Button>
                    </ButtonArea>
                </Page>
            </section>
        );
    }
}