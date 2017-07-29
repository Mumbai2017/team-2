package com.cfg.chaakri.chaakri;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

public class CustomerRegister extends AppCompatActivity {
    GPSTracker gps;
EditText username,mobilenumber;
    Button registerbutton;
    double latitude, longitude;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_customer_register);
        username=(EditText)findViewById(R.id.username);
        mobilenumber=(EditText)findViewById(R.id.mobilenumber);
        registerbutton=(Button)findViewById(R.id.registerbutton);
        registerbutton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                gps = new GPSTracker(CustomerRegister.this);
                if (gps.canGetLocation()) {
                    latitude = gps.getLatitude();
                    longitude = gps.getLongitude();
                }
                else
                {
                    Toast.makeText(CustomerRegister.this,"Unable to rtrieve loc",Toast.LENGTH_SHORT).show();
                }
                String user=username.getText().toString();
                String number=mobilenumber.getText().toString();
                String message= user+","+number+",2,"+latitude+","+longitude;
                Toast.makeText(CustomerRegister.this,message,Toast.LENGTH_SHORT).show();
            }
        });
    }
}
