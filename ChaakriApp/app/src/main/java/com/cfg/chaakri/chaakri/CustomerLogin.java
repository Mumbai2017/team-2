package com.cfg.chaakri.chaakri;

import android.content.SharedPreferences;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

public class CustomerLogin extends AppCompatActivity {
EditText editTextUser,editTextPass;
    Button button;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_customer_login);
        editTextUser=(EditText)findViewById(R.id.editTextUser);
        editTextPass=(EditText)findViewById(R.id.editTextPass);

        SharedPreferences prefs = getSharedPreferences("LoginPref", MODE_PRIVATE);
        String restoredText = prefs.getString("text", null);
        if (restoredText != null) {
            String ID = prefs.getString("Username", "No name defined");//"No name defined" is the default value.
            String PASS = prefs.getString("Password", "0000"); //0 is the default value.
            String msg = ID + "," + PASS;
            new CheckLogin(getApplicationContext()).execute(msg);
        }
        else {
            button.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {
                    String user = editTextUser.getText().toString();
                    String psw = editTextPass.getText().toString();

                    String message = user + "," + psw + ",2";
                    new CheckLogin(getApplicationContext()).execute(message);
                }
            });
        }
    }
}
