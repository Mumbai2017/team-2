package com.cfg.chaakri.chaakri;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

public class CustomerRegister extends AppCompatActivity {
    GPSTracker gps;
EditText cusername,cpass,cname;
    Button registerbutton;
    double latitude, longitude;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_customer_register);
        cusername=(EditText)findViewById(R.id.cusername);
        cname = (EditText) findViewById(R.id.cname);
        cpass=(EditText)findViewById(R.id.cpass);
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
                String user=cusername.getText().toString();
                String nameu = cname.getText().toString();
                String passw=cpass.getText().toString();
                String message= user+","+passw+",2,"+latitude+","+longitude+","+nameu;

                Toast.makeText(CustomerRegister.this,message,Toast.LENGTH_SHORT).show();

                new RegUser(getApplicationContext()).execute(message);


            }
        });
    }
}
